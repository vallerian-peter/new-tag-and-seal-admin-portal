<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalDisposalType extends Model
{
    use HasFactory;

    protected $table = 'animal_disposal_types';

    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get all disposals of this type.
     */
    public function disposals()
    {
        return $this->hasMany(Disposal::class, 'animal_disposal_type_id');
    }
}
