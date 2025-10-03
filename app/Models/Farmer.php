<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Farmer extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_no',
        'first_name',
        'middle_name',
        'surname',
        'phone_1',
        'phone_2', 'email',
        'physical_address',
        'date_of_birth',
        'gender_id',
        'identity_card_type_id',
        'identity_number', 'farmer_organization_membership', 'street_id', 'school_level_id', 'village_id',
        'ward_id', 'division_id', 'district_id', 'region_id', 'country_id', 'farmer_type_id', 'created_by',
        'updated_by', 'farmer_status_id', 'is_verified', 'created_at', 'updated_at'
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function idCardType()
    {
        return $this->belongsTo(IdentityCardType::class, 'identity_card_type_id');
    }

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id');
    }

    public function schoolLevel()
    {
        return $this->belongsTo(SchoolLevel::class, 'school_level_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function farmerType()
    {
        return $this->belongsTo(FarmerType::class, 'farmer_type_id');
    }

    public function status()
    {
        return $this->belongsTo(FarmerStatus::class, 'farmer_status_id');
    }

    public function attachments()
    {
        return $this->hasMany(FarmerAttachment::class, 'farmer_id');
    }

    public function farmOwners()
    {
        return $this->hasMany(FarmOwner::class, 'farmer_id');
    }

    public function farms()
    {
        return $this->hasManyThrough(Farm::class, FarmOwner::class, 'farmer_id', 'id', 'id', 'farm_id');
    }

    public function getFarmCountAttribute()
    {
        return $this->farmOwners()->count();
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by')->select('system_users.*')->join('system_users', 'system_users.id', '=', 'users.profile_id')->where('profile', 'SystemUser');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by')->select('system_users.*')->join('system_users', 'system_users.id', '=', 'users.profile_id')->where('profile', 'SystemUser');
    }
}
