<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PregnancyDiagnosisTestResult extends Model
{
    use HasFactory;

    protected $table = 'pregnancy_diagnosis_test_results';

    protected $fillable = [
        'name',
        'color',
        'created_at',
        'updated_at'
    ];

    public function pregnancyDiagnoses()
    {
        return $this->hasMany(Pregnancy::class, 'test_result_id');
    }
}
