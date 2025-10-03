<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivestockStatus extends Model
{
    use HasFactory;

    protected $table = 'livestock_statuses';

    protected $fillable = [
        'name',
        'color',
    ];

    public function livestocks()
    {
        return $this->hasMany(Livestock::class);
    }
}
