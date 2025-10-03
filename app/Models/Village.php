<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory;

    protected $table = 'villages';

    protected $fillable = [
        'name',
        'code',
        'ward_id',
        'created_by',
        'updated_by',
    ];

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }


    public function streets()
    {
        return $this->hasMany(Street::class, 'village_id');
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
