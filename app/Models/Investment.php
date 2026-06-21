<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'amount',
        'invested_at',
        'maturity_date',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:8',
        'invested_at' => 'datetime',
        'maturity_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(InvestmentPlan::class);
    }

    public function getRoiAttribute()
    {
        $daysInvested = $this->invested_at->diffInDays(now());
        $dailyRate = $this->plan->roi_percentage / 100 / 365;
        return $this->amount * $dailyRate * $daysInvested;
    }

    public function getTotalReturnAttribute()
    {
        return $this->amount + $this->roi;
    }
}
