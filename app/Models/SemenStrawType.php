<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemenStrawType extends Model
{
    use HasFactory;

    protected $table = 'livestock_insemination_semen_straw_types';

    protected $fillable = [
        'name',
        'category',
        'color',
    ];

    public function inseminations()
    {
        return $this->hasMany(Insemination::class, 'insemination_semen_straw_type_id');
    }
}
