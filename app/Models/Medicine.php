<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $fillable = [
        'name',
        'medicine_type_id',
    ];

    public function medicineType()
    {
        return $this->belongsTo(MedicineType::class, 'medicine_type_id');
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }
}
