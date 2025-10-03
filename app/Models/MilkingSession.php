<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilkingSession extends Model
{
    use HasFactory;

    protected $table = 'milking_sessions';

    protected $fillable = [
        'name',
        'color',
    ];

    public function milkings()
    {
        return $this->hasMany(Milking::class);
    }
}
