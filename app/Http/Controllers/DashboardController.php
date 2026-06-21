<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Deposit;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        $totalInvested = $user->investments()->sum('amount');
        $totalROI = $user->investments()->get()->sum(fn($inv) => $inv->roi);
        $totalDeposited = $user->deposits()->where('status', 'completed')->sum('amount');
        $totalWithdrawn = $user->withdrawals()->where('status', 'completed')->sum('amount');

        $investments = $user->investments()->with('plan')->latest()->get();
        $referralCount = $user->referrals()->count();

        return Inertia::render('Dashboard', [
            'stats' => [
                'totalInvested' => $totalInvested,
                'totalROI' => $totalROI,
                'totalDeposited' => $totalDeposited,
                'totalWithdrawn' => $totalWithdrawn,
                'walletBalance' => $user->wallet_balance,
                'referralCount' => $referralCount,
            ],
            'investments' => $investments,
        ]);
    }
}
