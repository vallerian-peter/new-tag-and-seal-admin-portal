<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    protected $fillable = [
        'name',
        'lot',
        'formulation_type',
        'dose',
        'created_by',
        'updated_by',
        'vaccine_status_id',
        'vaccine_type_id',
        'vaccine_schedule_id',
        'farm_id',
    ];

    public function vaccineStatus()
    {
        return $this->belongsTo(VaccineStatus::class, 'vaccine_status_id');
    }

    public function vaccineType()
    {
        return $this->belongsTo(VaccineType::class, 'vaccine_type_id');
    }

    public function vaccineSchedule()
    {
        return $this->belongsTo(VaccineSchedule::class, 'vaccine_schedule_id');
    }

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
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
