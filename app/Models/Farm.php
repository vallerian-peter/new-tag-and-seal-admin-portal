<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'regional_reg_no',
        'name',
        'size',
        'size_unit_id',
        'latitudes',
        'longitudes',
        'physical_address',
        'street_id',
        'village_id',
        'ward_id',
        'division_id',
        'district_id',
        'region_id',
        'country_id',
        'legal_status_id',
        'created_by',
        'updated_by',
        'farm_status_id',
        'has_coordinates',
        'gps',
        'uuid',
    ];

    public function sizeUnit()
    {
        return $this->belongsTo(SizeUnit::class, 'size_unit_id');
    }

    public function street()
    {
        return $this->belongsTo(Street::class, 'street_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function legalStatus()
    {
        return $this->belongsTo(LegalStatus::class, 'legal_status_id');
    }

    public function farmStatus()
    {
        return $this->belongsTo(FarmStatus::class, 'farm_status_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function farmOwners()
    {
        return $this->hasMany(FarmOwner::class, 'farm_id');
    }

    public function owners()
    {
        return $this->hasMany(FarmOwner::class, 'farm_id');
    }

    public function farmers()
    {
        return $this->hasManyThrough(Farmer::class, FarmOwner::class, 'farm_id', 'id', 'id', 'farmer_id');
    }

    public function users()
    {
        return $this->hasMany(FarmUser::class, 'farm_id');
    }

    public function getOwnerFullNameAttribute()
    {
        $owners = $this->farmOwners()->with('farmer')->get();
        if ($owners->isEmpty()) {
            return 'No Owner';
        }

        $names = $owners->map(function ($farmOwner) {
            if ($farmOwner->farmer) {
                return $farmOwner->farmer->first_name . ' ' . $farmOwner->farmer->surname;
            }
            return 'Unknown';
        });

        return $names->join(', ');
    }

    public function getLocationAttribute()
    {
        if ($this->latitudes && $this->longitudes && $this->has_coordinates) {
            return [
                'lat' => (float) $this->latitudes,
                'lng' => (float) $this->longitudes,
            ];
        }
        return null;
    }

    public function farmLivestocks()
    {
        return $this->hasMany(FarmLivestock::class, 'farm_id');
    }

    public function livestocks()
    {
        return $this->belongsToMany(Livestock::class, 'farm_livestocks', 'farm_id', 'livestock_id');
    }

    public function feedings()
    {
        return $this->hasMany(Feeding::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function vaccines()
    {
        return $this->hasMany(Vaccine::class);
    }

    /**
     * Generate UUID if not provided
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = \Illuminate\Support\Str::uuid()->toString();
            }
        });
    }

    /**
     * Get the validation rules for the model
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:farms,uuid,' . (request()->route('farm') ?? 'NULL'),
        ];
    }
}
