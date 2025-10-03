<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    protected $table = 'system_users';

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'address', 
        'created_by', 
        'updated_by', 
        'status_id'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
