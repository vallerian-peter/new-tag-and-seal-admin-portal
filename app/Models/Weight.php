<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weight extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'weight_gains';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'weight',
        'weight_gain',
        'weight_gain_unit_id',
        'remarks',
        'created_by',
        'updated_by',
        'state_id',
        'created_at',
        'updated_at',
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
    ];

    protected $casts = [
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
     * Get the farm that owns the weight.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    /**
     * Get the livestock that owns the weight.
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    /**
     * Get the weight unit that belongs to the weight.
     */
    public function weightUnit()
    {
        return $this->belongsTo(WeightUnit::class, 'weight_gain_unit_id');
    }

    /**
     * Get the state that owns the weight.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get the user who created the weight.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the weight.
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
            'uuid' => 'required|string|unique:weight_gains,uuid,' . (request()->route('weight') ?? 'NULL'),
            'reference_no' => 'required|string|max:255',
            'farm_id' => 'required|exists:farms,id',
            'livestock_id' => 'required|exists:livestocks,id',
            'weight' => 'nullable|numeric|min:0',
            'weight_gain' => 'nullable|numeric',
            'weight_gain_unit_id' => 'nullable|exists:weight_units,id',
            'remarks' => 'nullable|string',
            'state_id' => 'required|exists:states,id',
        ];
    }
}
