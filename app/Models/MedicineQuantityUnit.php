<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineQuantityUnit extends Model
{
    use HasFactory;

    protected $table = 'medicine_quantity_units';

    protected $fillable = [
        'name',
        'color',
    ];

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
