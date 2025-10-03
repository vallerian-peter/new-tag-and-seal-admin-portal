<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insemination extends Model
{
    use HasFactory;

    protected $table = 'livestock_inseminations';

    protected $fillable = [
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
    ];

    protected $casts = [
        'last_heat_date' => 'date',
        'insemination_date' => 'date',
        'semen_production_date' => 'date',
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
}
