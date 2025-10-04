<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $table = 'vaccinations';

    protected $fillable = [
        'uuid',
        'vaccination_no',
        'farm_id',
        'livestock_id',
        'vaccine_id',
        'disease_id',
        'vet_id',
        'extension_officer_id',
        'created_by',
        'updated_by',
        'vaccination_status_id',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
    ];

    protected $casts = [
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
    ];

    // Relationships
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

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
        return $this->belongsTo(User::class, 'vet_id');
    }

    public function extensionOfficer()
    {
        return $this->belongsTo(User::class, 'extension_officer_id');
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

    /**
     * Generate UUID if not provided
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = \Illuminate\Support\Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the validation rules for the model
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:vaccinations,uuid,' . (request()->route('vaccination') ?? 'NULL'),
        ];
    }
}
