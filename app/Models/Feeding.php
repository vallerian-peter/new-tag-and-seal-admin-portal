<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feeding extends Model
{
    use HasFactory;

    protected $table = 'feedings';

    protected $fillable = [
        'uuid',
        'reference_no',
        'farm_id',
        'livestock_id',
        'feeding_type_id',
        'amount',
        'remarks',
        'feeding_time',
        'created_by',
        'updated_by',
        'state_id',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at'
    ];

    protected $casts = [
        'feeding_time' => 'datetime',
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

    public function feedingType()
    {
        return $this->belongsTo(FeedingType::class, 'feeding_type_id');
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
            'uuid' => 'required|string|unique:feedings,uuid,' . (request()->route('feeding') ?? 'NULL'),
        ];
    }
}
