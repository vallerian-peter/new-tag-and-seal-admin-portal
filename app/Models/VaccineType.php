<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineType extends Model
{
    use HasFactory;

    protected $table = 'vaccine_types';

    protected $fillable = [
        'name',
        'color',
    ];

    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }
}
