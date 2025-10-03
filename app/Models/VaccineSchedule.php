<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineSchedule extends Model
{
    use HasFactory;

    protected $table = 'vaccine_schedules';

    protected $fillable = [
        'name',
        'color',
    ];

    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }
}
