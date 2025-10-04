<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $table = 'vaccines';

    protected $fillable = [
        'uuid',
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
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
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

    protected $casts = [
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
    ];

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
            'uuid' => 'required|string|unique:vaccines,uuid,' . (request()->route('vaccine') ?? 'NULL'),
        ];
    }
}
