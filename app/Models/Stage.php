<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $table = 'stages';

    protected $fillable = [
        'name',
        'color',
        'livestock_type_id',
    ];

    public function livestockType()
    {
        return $this->belongsTo(LivestockType::class);
    }
}
