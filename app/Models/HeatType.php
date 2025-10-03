<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeatType extends Model
{
    use HasFactory;

    protected $table = 'livestock_heat_types';

    protected $fillable = [
        'name',
        'color',
    ];

    public function inseminations()
    {
        return $this->hasMany(Insemination::class, 'current_heat_type_id');
    }
}
