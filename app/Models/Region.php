<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'regionID',
        'name',
        'code',
        'country_id',
        'abbreviation',
        'created_by',
        'updated_by',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'region_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'region_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'region_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class, 'region_id');
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
