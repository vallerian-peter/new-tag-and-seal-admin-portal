<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    protected $table = 'species';

    protected $fillable = [
        'name',
        'color',
    ];

    public function livestocks()
    {
        return $this->hasMany(Livestock::class);
    }
}
