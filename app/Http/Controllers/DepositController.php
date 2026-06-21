<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Auth::user()->deposits()->latest()->paginate(10);
        
        return Inertia::render('Deposits', [
            'deposits' => $deposits,
        ]);
    }

    public function create()
    {
        return Inertia::render('DepositForm');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:10',
            'currency' => 'required|in:BTC,ETH,USDT,USD',
            'payment_method' => 'required|in:bank_transfer,crypto,card',
        ]);

        $deposit = Auth::user()->deposits()->create([
            ...$validated,
            'status' => 'pending',
            'transaction_id' => 'TXN-' . uniqid(),
        ]);

        return redirect()->route('deposits.show', $deposit)->with('success', 'Deposit initiated');
    }
}
