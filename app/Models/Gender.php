<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_name',
    ];

    public function getColor(): string
    {
        return $this->name === 'male' ? 'blue' : 'pink';
    }

    public static function getColorStatic($genderName): string
    {
        return $genderName === 'male' ? 'blue' : 'pink';
    }
}
