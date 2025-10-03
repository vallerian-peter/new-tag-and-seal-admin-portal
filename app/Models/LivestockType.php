<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockType extends Model
{
    use HasFactory;

    protected $table = 'livestock_types';

    protected $fillable = [
        'name',
        'color',
    ];

    public function livestocks()
    {
        return $this->hasMany(Livestock::class);
    }

    public function breeds()
    {
        return $this->hasMany(Breed::class);
    }
}
