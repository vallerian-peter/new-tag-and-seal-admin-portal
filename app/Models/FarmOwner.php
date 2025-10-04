<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmOwner extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'farm_id',
        'assigned_by',
        'state_id',
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
