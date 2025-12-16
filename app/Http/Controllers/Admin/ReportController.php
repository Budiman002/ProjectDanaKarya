<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $totalDonations = Donation::where('status', 'success')->sum('amount');
        $donationsCount = Donation::where('status', 'success')->count();
        $totalCampaigns = Campaign::count();
        $successfulCampaigns = Campaign::where('status', 'completed')->count();

        $topCampaigns = Campaign::withSum(['donations' => function($query) {
            $query->where('status', 'success');
        }], 'amount')
        ->orderBy('donations_sum_amount', 'desc')
        ->take(5)
        ->get();

        $topDonors = User::whereHas('donations', function($query) {
            $query->where('status', 'success');
        })
        ->withSum(['donations' => function($query) {
            $query->where('status', 'success');
        }], 'amount')
        ->orderBy('donations_sum_amount', 'desc')
        ->take(5)
        ->get();

        $monthlyDonations = Donation::where('status', 'success')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('SUM(amount) as total'),
                DB::raw('COUNT(*) as count')
            )
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->take(12)
            ->get()
            ->reverse()
            ->values();

        $categoryStats = Campaign::select('categories.name', DB::raw('COUNT(campaigns.id) as total'))
            ->join('categories', 'campaigns.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->orderBy('total', 'desc')
            ->get();

        return view('admin.reports.index', [
            'title' => 'Reports & Analytics',
            'subtitle' => 'Platform performance insights',
            'totalDonations' => $totalDonations,
            'donationsCount' => $donationsCount,
            'totalCampaigns' => $totalCampaigns,
            'successfulCampaigns' => $successfulCampaigns,
            'topCampaigns' => $topCampaigns,
            'topDonors' => $topDonors,
            'monthlyDonations' => $monthlyDonations,
            'categoryStats' => $categoryStats,
        ]);
    }
}
