<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilkingMethod extends Model
{
    use HasFactory;

    protected $table = 'milking_methods';

    protected $fillable = [
        'name',
        'color',
    ];

    public function milkings()
    {
        return $this->hasMany(Milking::class);
    }
}
