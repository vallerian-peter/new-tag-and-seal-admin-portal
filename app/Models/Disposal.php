<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disposal extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'animal_disposals';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'animal_disposal_type_id',
        'reasons',
        'remarks',
        'meat_obtaines',
        'vet_id',
        'extension_officer_id',
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
     * Get the farm that owns the disposal.
     */
    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id');
    }

    /**
     * Get the livestock that owns the disposal.
     */
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    /**
     * Get the disposal type that belongs to the disposal.
     */
    public function disposalType()
    {
        return $this->belongsTo(AnimalDisposalType::class, 'animal_disposal_type_id');
    }

    /**
     * Get the vet that belongs to the disposal.
     */
    public function vet()
    {
        return $this->belongsTo(User::class, 'vet_id');
    }

    /**
     * Get the extension officer that belongs to the disposal.
     */
    public function extensionOfficer()
    {
        return $this->belongsTo(User::class, 'extension_officer_id');
    }

    /**
     * Get the state that owns the disposal.
     */
    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    /**
     * Get the user who created the disposal.
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated the disposal.
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
            'uuid' => 'required|string|unique:animal_disposals,uuid,' . (request()->route('disposal') ?? 'NULL'),
            'reference_no' => 'required|string|max:255',
            'farm_id' => 'required|exists:farms,id',
            'livestock_id' => 'required|exists:livestocks,id',
            'animal_disposal_type_id' => 'nullable|exists:animal_disposal_types,id',
            'reasons' => 'nullable|string',
            'remarks' => 'nullable|string',
            'meat_obtained' => 'nullable|boolean',
            'vet_id' => 'nullable|exists:vets,id',
            'extension_officer_id' => 'nullable|exists:extension_officers,id',
            'state_id' => 'required|exists:states,id',
        ];
    }
}
