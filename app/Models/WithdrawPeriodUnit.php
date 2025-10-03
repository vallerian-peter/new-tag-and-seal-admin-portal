<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawPeriodUnit extends Model
{
    use HasFactory;

    protected $table = 'withdraw_period_units';

    protected $fillable = [
        'name',
        'color',
    ];

    public function medications()
    {
        return $this->hasMany(Medication::class, 'withdrawal_period_unit_id');
    }
}
