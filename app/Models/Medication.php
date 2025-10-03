<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medications';

    protected $fillable = [
        'quantity',
        'withdrawal_period',
        'remarks',
        'created_by',
        'updated_by',
        'state_id',
        'farm_id',
        'disease_id',
        'livestock_id',
        'medicine_id',
        'quantity_unit_id',
        'withdrawal_period_unit_id',
        'medication_date',
    ];

    protected $casts = [
        'medication_date' => 'date',
    ];

    // Relationships
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function quantityUnit()
    {
        return $this->belongsTo(MedicineQuantityUnit::class, 'quantity_unit_id');
    }

    public function withdrawalPeriodUnit()
    {
        return $this->belongsTo(WithdrawPeriodUnit::class, 'withdrawal_period_unit_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
