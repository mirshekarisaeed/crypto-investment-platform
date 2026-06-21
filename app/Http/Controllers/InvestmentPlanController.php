<?php

namespace App\Http\Controllers;

use App\Models\InvestmentPlan;
use Inertia\Inertia;

class InvestmentPlanController extends Controller
{
    public function index()
    {
        $plans = InvestmentPlan::where('status', 'active')->get();
        
        return Inertia::render('Plans', [
            'plans' => $plans,
        ]);
    }
}
