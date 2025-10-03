<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockObtainedMethod extends Model
{
    use HasFactory;

    protected $table = 'livestock_obtained_methods';

    protected $fillable = [
        'name',
        'color',
    ];

    public function livestocks()
    {
        return $this->hasMany(Livestock::class);
    }
}
