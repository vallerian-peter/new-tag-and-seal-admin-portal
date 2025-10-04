<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dryoff extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'drying_offs';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'serial',
        'start_date',
        'end_date',
        'expected_calving_date',
        'created_by',
        'updated_by',
        'state_id',
        'created_at',
        'updated_at',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'expected_calving_date' => 'datetime',
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
        'deleted_at' => 'datetime',
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
     * Get the farm that owns the dryoff.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    /**
     * Get the livestock that owns the dryoff.
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    /**
     * Get the state that owns the dryoff.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get the user who created the dryoff.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the dryoff.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Validation rules
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:drying_offs,uuid,' . (request()->route('dryoff') ?? 'NULL'),
            'reference_no' => 'required|string|max:255',
            'farm_id' => 'required|exists:farms,id',
            'livestock_id' => 'required|exists:livestocks,id',
            'serial' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'expected_calving_date' => 'nullable|date|after:start_date',
            'state_id' => 'required|exists:states,id',
        ];
    }
}
