<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FarmerAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'attachment_id',
        'state_id',
        'created_by'
    ];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmer_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
