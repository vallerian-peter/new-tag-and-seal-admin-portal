<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'region_id',
        'country_id',
        'districtID',
        'created_by',
        'updated_by',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, 'district_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class, 'district_id');
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
