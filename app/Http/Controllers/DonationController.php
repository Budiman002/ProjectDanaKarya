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
        $campaign = Campaign::where('slug', $slug)->firstOrFail();

        if ($campaign->status === 'funded' || $campaign->current_amount >= $campaign->target_amount) {
            return redirect()->route('campaigns.show', $campaign->slug)
                ->with('error', 'This campaign has reached its funding goal and is no longer accepting donations.');
        }

        if ($campaign->status !== 'active') {
            return redirect()->route('campaigns.show', $campaign->slug)
                ->with('error', 'This campaign is not currently accepting donations.');
        }

        return view('donations.create', [
            'title' => 'Donate to ' . $campaign->title,
            'campaign' => $campaign,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'campaign_id' => ['required', 'exists:campaigns,id'],
                'amount' => ['required', 'numeric', 'min:10000'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['required', 'string', 'max:20'],
                'bank' => ['required', 'string', 'in:BCA,MANDIRI,BNI,BRI,PERMATA,CIMB'],
                'message' => ['nullable', 'string', 'max:500'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }

        $campaign = Campaign::findOrFail($validated['campaign_id']);

        if ($campaign->status === 'funded' || $campaign->current_amount >= $campaign->target_amount) {
            return response()->json([
                'error' => 'This campaign has reached its funding goal and is no longer accepting donations.'
            ], 400);
        }

        if ($campaign->status !== 'active') {
            return response()->json([
                'error' => 'Campaign is not active'
            ], 400);
        }

        $vaNumber = $this->generateVANumber($validated['bank']);

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'campaign_id' => $validated['campaign_id'],
            'amount' => $validated['amount'],
            'status' => 'pending',
            'payment_method' => 'bank_transfer',
            'bank' => $validated['bank'],
            'va_number' => $vaNumber,
            'message' => $validated['message'],
        ]);

        $donation->load(['campaign.user', 'user']);

        NotificationService::newDonation($donation);

        return response()->json([
            'success' => true,
            'donation_id' => $donation->id,
            'message' => 'Please complete your payment',
        ]);
    }

    private function generateVANumber($bank)
    {
        $bankCodes = [
            'BCA' => '14',
            'MANDIRI' => '88',
            'BNI' => '46',
            'BRI' => '03',
            'PERMATA' => '13',
            'CIMB' => '22',
        ];

        $bankCode = $bankCodes[$bank] ?? '99';
        $timestamp = substr(time(), -8);
        $random = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        return $bankCode . $timestamp . $random;
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