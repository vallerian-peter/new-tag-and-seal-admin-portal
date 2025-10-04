<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calving extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'calving_type_id',
        'calving_problems_id',
        'reproductive_problem_id',
        'remarks',
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
     * Get the farm that owns the calving.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    /**
     * Get the livestock that owns the calving.
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    /**
     * Get the calving type that belongs to the calving.
     */
    public function calvingType()
    {
        return $this->belongsTo(CalvingType::class, 'calving_type_id');
    }

    /**
     * Get the calving problem that belongs to the calving.
     */
    public function calvingProblem()
    {
        return $this->belongsTo(CalfProblemType::class, 'calving_problems_id');
    }

    /**
     * Get the reproductive problem that belongs to the calving.
     */
    public function reproductiveProblem()
    {
        return $this->belongsTo(CalfReproductiveProblemType::class, 'reproductive_problem_id');
    }

    /**
     * Get the state that owns the calving.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get the user who created the calving.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the calving.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the calves for the calving.
     */
    public function calfs()
    {
        return $this->hasMany(Calf::class, 'calving_id');
    }

    /**
     * Validation rules
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:calvings,uuid,' . (request()->route('calving') ?? 'NULL'),
            'reference_no' => 'required|string|max:255',
            'farm_id' => 'required|exists:farms,id',
            'livestock_id' => 'required|exists:livestocks,id',
            'calving_type_id' => 'nullable|exists:calving_types,id',
            'calving_problems_id' => 'nullable|exists:calf_problem_types,id',
            'reproductive_problem_id' => 'nullable|exists:calf_reproductive_problem_types,id',
            'remarks' => 'nullable|string',
            'state_id' => 'required|exists:states,id',
        ];
    }
}
