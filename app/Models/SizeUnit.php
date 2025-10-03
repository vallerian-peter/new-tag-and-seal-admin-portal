<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SizeUnit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
        'description',
    ];
}
