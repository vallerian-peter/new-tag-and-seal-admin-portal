<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InseminationService extends Model
{
    use HasFactory;

    protected $table = 'livestock_insemination_services';

    protected $fillable = [
        'name',
        'color',
    ];

    public function inseminations()
    {
        return $this->hasMany(Insemination::class, 'insemination_service_id');
    }
}
