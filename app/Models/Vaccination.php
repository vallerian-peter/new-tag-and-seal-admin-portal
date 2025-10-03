<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $table = 'vaccinations';

    protected $fillable = [
        'vaccination_no',
        'livestock_id',
        'vaccine_id',
        'disease_id',
        'vet_id',
        'extension_officer_id',
        'created_by',
        'updated_by',
        'vaccination_status_id',
    ];

    // Relationships
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class, 'vaccine_id');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function vet()
    {
        return $this->belongsTo(Vet::class, 'vet_id');
    }

    public function extensionOfficer()
    {
        return $this->belongsTo(ExtensionOfficer::class, 'extension_officer_id');
    }

    public function vaccinationStatus()
    {
        return $this->belongsTo(VaccineStatus::class, 'vaccination_status_id');
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
