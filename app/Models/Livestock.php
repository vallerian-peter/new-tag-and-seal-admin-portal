<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestocks';

    protected $fillable = [
        'identification_number',
        'livestock_type_id',
        'name',
        'date_of_birth',
        'mother_id',
        'father_id',
        'gender_id',
        'breed_id',
        'species_id',
        'created_by',
        'updated_by',
        'livestock_status_id',
        'livestock_obtained_method_id',
        'date_first_entered_to_farm',
        'weight_as_on_registration',
        'total_milk_produced',
        'parity_lactacting_number',
        'date_of_last_calving',
        'farm_id',
        'owner_id',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_first_entered_to_farm' => 'datetime',
        'date_of_last_calving' => 'datetime',
    ];

    // Relationships
    public function livestockType()
    {
        return $this->belongsTo(LivestockType::class, 'livestock_type_id');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }

    public function livestockStatus()
    {
        return $this->belongsTo(LivestockStatus::class, 'livestock_status_id');
    }

    public function livestockObtainedMethod()
    {
        return $this->belongsTo(LivestockObtainedMethod::class, 'livestock_obtained_method_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function mother()
    {
        return $this->belongsTo(Livestock::class, 'mother_id');
    }

    public function father()
    {
        return $this->belongsTo(Livestock::class, 'father_id');
    }

    public function children()
    {
        return $this->hasMany(Livestock::class, 'mother_id')
                    ->orWhere('father_id', $this->id);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function owner()
    {
        return $this->belongsTo(Farmer::class, 'owner_id');
    }

    public function feedings()
    {
        return $this->hasMany(Feeding::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

    public function inseminations()
    {
        return $this->hasMany(Insemination::class);
    }

    public function milkings()
    {
        return $this->hasMany(Milking::class);
    }
}
