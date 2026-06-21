<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minimum_amount',
        'maximum_amount',
        'roi_percentage',
        'duration_days',
        'status',
    ];

    protected $casts = [
        'minimum_amount' => 'decimal:8',
        'maximum_amount' => 'decimal:8',
        'roi_percentage' => 'decimal:5,2',
    ];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
