<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    use HasFactory;

    protected $table = 'medications';

    protected $fillable = [
        'uuid',
        'quantity',
        'withdrawal_period',
        'remarks',
        'created_by',
        'updated_by',
        'state_id',
        'farm_id',
        'disease_id',
        'livestock_id',
        'medicine_id',
        'quantity_unit_id',
        'withdrawal_period_unit_id',
        'medication_date',
        'vet_id',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
    ];

    protected $casts = [
        'medication_date' => 'date',
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

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function quantityUnit()
    {
        return $this->belongsTo(MedicineQuantityUnit::class, 'quantity_unit_id');
    }

    public function withdrawalPeriodUnit()
    {
        return $this->belongsTo(WithdrawPeriodUnit::class, 'withdrawal_period_unit_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function vet()
    {
        return $this->belongsTo(User::class, 'vet_id');
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
            'uuid' => 'required|string|unique:medications,uuid,' . (request()->route('medication') ?? 'NULL'),
        ];
    }
}
