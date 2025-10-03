<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineStatus extends Model
{
    use HasFactory;

    protected $table = 'vaccine_statuses';

    protected $fillable = [
        'name',
        'color',
    ];

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
