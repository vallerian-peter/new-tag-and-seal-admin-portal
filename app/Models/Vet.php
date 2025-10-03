<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    use HasFactory;

    protected $table = 'vets';

    protected $fillable = [
        'registration_no',
        'name',
        'phone_1',
        'phone_2',
        'email',
        'address',
        'medical_licence_no',
        'date_of_birth',
        'gender_id',
        'identity_card_type_id',
        'identity_number',
        'school_level_id',
        'country_id',
        'region_id',
        'district_id',
        'created_by',
        'updated_by',
        'status_id',
        'is_verified',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_verified' => 'boolean',
    ];

    // Relationships
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function identityCardType()
    {
        return $this->belongsTo(IdentityCardType::class, 'identity_card_type_id');
    }

    public function schoolLevel()
    {
        return $this->belongsTo(SchoolLevel::class, 'school_level_id');
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

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class, 'vet_id');
    }
}
