<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedingType extends Model
{
    use HasFactory;

    protected $table = 'feeding_types';

    protected $fillable = [
        'name',
        'color',
    ];

    public function feedings()
    {
        return $this->hasMany(Feeding::class);
    }
}
