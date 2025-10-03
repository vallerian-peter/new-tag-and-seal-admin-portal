<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table = 'diseases';

    protected $fillable = [
        'name',
        'description',
        'is_spreadable',
    ];

    protected $casts = [
        'is_spreadable' => 'boolean',
    ];

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }
}
