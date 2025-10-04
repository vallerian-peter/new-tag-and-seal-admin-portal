<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender_id',
        'date_of_birth',
        'weight_at_birth',
        'calving_id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    public function calving()
    {
        return $this->belongsTo(Calving::class, 'calving_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
