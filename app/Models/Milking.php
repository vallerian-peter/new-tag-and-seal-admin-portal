<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milking extends Model
{
    use HasFactory;

    protected $table = 'milkings';

    protected $fillable = [
        'uuid',
        'reference_no',
        'livestock_id',
        'milking_session_id',
        'amount',
        'lactometer_reading',
        'solid',
        'solid_non_fat',
        'protein',
        'corrected_lactometer_reading',
        'total_solids',
        'colony_forming_units',
        'acidity',
        'created_by',
        'updated_by',
        'milking_status_id',
        'milking_method_id',
        'milking_unit_id',
    ];

    // Relationships
    public function livestock()
    {
        return $this->belongsTo(Livestock::class, 'livestock_id');
    }

    public function milkingSession()
    {
        return $this->belongsTo(MilkingSession::class, 'milking_session_id');
    }

    public function milkingStatus()
    {
        return $this->belongsTo(MilkingStatus::class, 'milking_status_id');
    }

    public function milkingMethod()
    {
        return $this->belongsTo(MilkingMethod::class, 'milking_method_id');
    }

    public function milkingUnit()
    {
        return $this->belongsTo(MilkingUnit::class, 'milking_unit_id');
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
            'uuid' => 'required|string|unique:milkings,uuid,' . (request()->route('milking') ?? 'NULL'),
        ];
    }
}
