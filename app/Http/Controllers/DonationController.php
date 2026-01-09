<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class DonationController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function create($slug)
    {
        $campaign = Campaign::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return view('donations.create', [
            'title' => 'Donate to ' . $campaign->title,
            'campaign' => $campaign,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'campaign_id' => ['required', 'exists:campaigns,id'],
            'amount' => ['required', 'numeric', 'min:10000'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'message' => ['nullable', 'string', 'max:500'],
        ]);

        $campaign = Campaign::findOrFail($validated['campaign_id']);

        if ($campaign->status !== 'active') {
            return response()->json([
                'error' => 'Campaign is not active'
            ], 400);
        }

        // Create donation with pending status
        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $validated['campaign_id'],
            'amount' => $validated['amount'],
            'status' => 'pending',
            'payment_method' => 'midtrans',
            'message' => $validated['message'],
        ]);

        // Create Midtrans transaction
        $orderId = 'DONATION-' . $donation->id . '-' . time();

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => (int) $validated['amount'],
        ];

        $customerDetails = [
            'first_name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ];

        $itemDetails = [
            [
                'id' => 'donation-' . $campaign->id,
                'price' => (int) $validated['amount'],
                'quantity' => 1,
                'name' => 'Donation for: ' . substr($campaign->title, 0, 40),
            ]
        ];

        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
            'enabled_payments' => ['credit_card', 'bca_va', 'bni_va', 'bri_va', 'mandiri_va', 'permata_va', 'other_va', 'gopay', 'shopeepay', 'qris'],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            // Save snap token to donation
            $donation->update(['snap_token' => $snapToken]);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'donation_id' => $donation->id,
            ]);
        } catch (\Exception $e) {
            $donation->delete();
            return response()->json([
                'error' => 'Failed to create payment: ' . $e->getMessage()
            ], 500);
        }
    }

    public function success($id)
    {
        $donation = Donation::with(['campaign', 'user'])->findOrFail($id);

        return view('donations.success', [
            'title' => 'Thank You!',
            'donation' => $donation,
        ]);
    }
}
