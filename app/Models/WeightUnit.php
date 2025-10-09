<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightUnit extends Model
{
    use HasFactory;

    protected $table = 'weight_units';

    protected $fillable = [
        'name',
        'abbreviation',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get all weights using this unit.
     */
    public function weights()
    {
        return $this->hasMany(Weight::class, 'weight_gain_unit_id');
    }
}
