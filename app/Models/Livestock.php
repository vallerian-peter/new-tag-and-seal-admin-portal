<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    use HasFactory;

    protected $table = 'livestocks';

    protected $fillable = [
        'identification_number',
        'livestock_type_id',
        'name',
        'date_of_birth',
        'mother_id',
        'father_id',
        'gender_id',
        'breed_id',
        'species_id',
        'created_by',
        'updated_by',
        'livestock_status_id',
        'livestock_obtained_method_id',
        'date_first_entered_to_farm',
        'weight_as_on_registration',
        'total_milk_produced',
        'parity_lactacting_number',
        'date_of_last_calving',
        'uuid',
        // Sync fields
        'last_modified_at',
        'sync_status',
        'device_id',
        'original_created_at'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_first_entered_to_farm' => 'datetime',
        'date_of_last_calving' => 'datetime',
        'last_modified_at' => 'datetime',
        'original_created_at' => 'datetime',
    ];

    // Relationships
    public function livestockType()
    {
        return $this->belongsTo(LivestockType::class, 'livestock_type_id');
    }

    public function breed()
    {
        return $this->belongsTo(Breed::class, 'breed_id');
    }

    public function species()
    {
        return $this->belongsTo(Species::class, 'species_id');
    }

    public function livestockStatus()
    {
        return $this->belongsTo(LivestockStatus::class, 'livestock_status_id');
    }

    public function livestockObtainedMethod()
    {
        return $this->belongsTo(LivestockObtainedMethod::class, 'livestock_obtained_method_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function mother()
    {
        return $this->belongsTo(Livestock::class, 'mother_id');
    }

    public function father()
    {
        return $this->belongsTo(Livestock::class, 'father_id');
    }

    public function children()
    {
        return $this->hasMany(Livestock::class, 'mother_id')
                    ->orWhere('father_id', $this->id);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    /**
     * Get all farms that own this livestock.
     */
    public function farms()
    {
        return $this->belongsToMany(Farm::class, 'farm_livestocks', 'livestock_id', 'farm_id')
            ->withPivot(['state_id', 'created_by', 'updated_by'])
            ->withTimestamps();
    }
    
    /**
     * Get the primary farm that owns this livestock.
     *
     * @return \App\Models\Farm|null
     */
    public function farm()
    {
        return $this->farms()->first() ?? null;
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function farmLivestocks()
    {
        return $this->hasMany(FarmLivestock::class, 'livestock_id');
    }

    public function owners()
    {
        return $this->hasManyThrough(
            Farmer::class,
            FarmOwner::class,
            'farm_id', // Foreign key on farm_owners table
            'id', // Foreign key on farmers table
            'id', // Local key on livestocks table
            'farmer_id' // Local key on farm_owners table
        )->whereExists(function ($query) {
            $query->select('*')
                  ->from('farm_livestocks')
                  ->whereColumn('farm_livestocks.farm_id', 'farm_owners.farm_id')
                  ->whereColumn('farm_livestocks.livestock_id', 'livestocks.id');
        });
    }

    /**
     * Get the primary owner of this livestock.
     *
     * @return \App\Models\Farmer|null
     */
    public function owner()
    {
        return $this->owners()->first();
    }

    public function feedings()
    {
        return $this->hasMany(Feeding::class);
    }

    public function medications()
    {
        return $this->hasMany(Medication::class);
    }

    public function vaccinations()
    {
        return $this->hasMany(Vaccination::class);
    }

    public function inseminations()
    {
        return $this->hasMany(Insemination::class);
    }

    public function milkings()
    {
        return $this->hasMany(Milking::class);
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
            'uuid' => 'required|string|unique:livestocks,uuid,' . (request()->route('livestock') ?? 'NULL'),
        ];
    }
}
