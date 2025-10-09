<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deworming extends Model
{
    use HasFactory;

    protected $table = 'dewormings';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'dose',
        'administration_route',
        'next_administration_date',
        'remarks',
        'vet_id',
        'extension_officer_id',
        'created_by',
        'updated_by',
        'state_id',
        'medicine_id',
        'quantity_unit_id',
        'quantity',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
    ];

    protected $casts = [
        'next_administration_date' => 'date',
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
        'quantity' => 'decimal:2',
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

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    public function quantityUnit()
    {
        return $this->belongsTo(MedicineQuantityUnit::class, 'quantity_unit_id');
    }

    public function vet()
    {
        return $this->belongsTo(User::class, 'vet_id');
    }

    public function extensionOfficer()
    {
        return $this->belongsTo(User::class, 'extension_officer_id');
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

    /**
     * Generate UUID and reference_no if not provided
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = \Illuminate\Support\Str::uuid()->toString();
            }
            if (empty($model->reference_no)) {
                $model->reference_no = 'DW' . hrtime()[1];
            }
        });
    }

    /**
     * Get the validation rules for the model
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:dewormings,uuid,' . (request()->route('deworming') ?? 'NULL'),
            'reference_no' => 'required|string|unique:dewormings,reference_no,' . (request()->route('deworming') ?? 'NULL'),
        ];
    }
}
