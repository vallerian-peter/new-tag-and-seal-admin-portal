<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregnancy extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pregnancy_diagnosis';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'serial',
        'test_result_id',
        'no_of_months',
        'test_date',
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
        'test_date' => 'datetime',
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
     * Get the farm that owns the pregnancy diagnosis.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    /**
     * Get the livestock that owns the pregnancy diagnosis.
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    /**
     * Get the test result that belongs to the pregnancy diagnosis.
     */
    public function testResult()
    {
        return $this->belongsTo(PregnancyDiagnosisTestResult::class, 'test_result_id');
    }

    /**
     * Get the state that owns the pregnancy diagnosis.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get the user who created the pregnancy diagnosis.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the pregnancy diagnosis.
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
            'uuid' => 'required|string|unique:pregnancy_diagnosis,uuid,' . (request()->route('pregnancy') ?? 'NULL'),
            'reference_no' => 'required|string|max:255',
            'farm_id' => 'required|exists:farms,id',
            'livestock_id' => 'required|exists:livestocks,id',
            'serial' => 'nullable|string|max:255',
            'test_result_id' => 'nullable|exists:pregnancy_diagnosis_test_results,id',
            'no_of_months' => 'nullable|integer|min:0|max:12',
            'test_date' => 'nullable|date',
            'remarks' => 'nullable|string',
            'state_id' => 'required|exists:states,id',
        ];
    }
}
