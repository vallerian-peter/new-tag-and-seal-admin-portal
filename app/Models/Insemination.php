<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insemination extends Model
{
    use HasFactory;

    protected $table = 'livestock_inseminations';

    protected $fillable = [
        'uuid',
        'reference_no',
        'livestock_id',
        'serial',
        'last_heat_date',
        'current_heat_type_id',
        'insemination_date',
        'insemination_service_id',
        'insemination_semen_straw_type_id',
        'bull_code',
        'bull_breed',
        'semen_production_date',
        'production_country',
        'semen_batch_number',
        'international_id',
        'ai_code',
        'manufacturer_name',
        'semen_supplier',
        'state_id',
        'created_by',
        'updated_by',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at',
    ];

    protected $casts = [
        'last_heat_date' => 'date',
        'insemination_date' => 'date',
        'semen_production_date' => 'date',
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
    ];

    // Relationships
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    public function currentHeatType()
    {
        return $this->belongsTo(HeatType::class, 'current_heat_type_id');
    }

    public function inseminationService()
    {
        return $this->belongsTo(InseminationService::class, 'insemination_service_id');
    }

    public function semenStrawType()
    {
        return $this->belongsTo(SemenStrawType::class, 'insemination_semen_straw_type_id');
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
            'uuid' => 'required|string|unique:livestock_inseminations,uuid,' . (request()->route('insemination') ?? 'NULL'),
        ];
    }
}
