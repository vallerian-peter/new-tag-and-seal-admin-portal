<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtensionOfficer extends Model
{
    protected $table = 'extension_officers';

    protected $fillable = [
        'first_name',
        'middle_name',
        'surname',
        'gender_id',
        'phone_1',
        'phone_2',
        'email',
        'physical_address',
        'date_of_birth',
        'identity_card_type_id',
        'identity_number',
        'street_id',
        'school_level_id',
        'village_id',
        'ward_id',
        'division_id',
        'district_id',
        'region_id',
        'country_id',
        'officer_no',
        'officer_status_id',
        'created_by',
        'updated_by',
        'is_verified'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_verified' => 'boolean',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'officer_status_id');
    }

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

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the full name of the extension officer
     */
    public function getFullNameAttribute(): string
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->surname}");
    }
}