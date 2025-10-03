<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ward extends Model
{
    use HasFactory;

    protected $table = 'wards';

    protected $fillable = [
        'wardID',
        'name',
        'code',
        'district_id',
        'created_by',
        'updated_by',
    ];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }


    public function villages()
    {
        return $this->hasMany(Village::class, 'ward_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class, 'ward_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
