<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\State;
use App\Models\Farmer;
use App\Models\Status;
use App\Models\SystemUser;
use App\Models\ExtensionOfficer;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'password',
        'username',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'profile',
        'profile_id',
        'status_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $this->profile == 'SystemUser' ||  $this->profile_id == 1;
    }

    public function getUserName(): string
    {
        return (string) $this->username;
    }

    /**
     * Get the user's name for Filament display
     */
    public function getNameAttribute(): string
    {
        return $this->username;
    }

    /**
     * Get the user's name for Filament display (alternative method)
     */
    public function name(): string
    {
        return $this->username;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the farmer profile if user is a farmer
     */
    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'profile_id');
    }

    public function systemUser()
    {
        return $this->belongsTo(SystemUser::class, 'profile_id');
    }

    public function extensionOfficer()
    {
        return $this->belongsTo(ExtensionOfficer::class, 'profile_id');
    }

    public function farmUsers()
    {
        return $this->hasMany(FarmUser::class, 'user_id');
    }

    public function farms()
    {
        return $this->hasManyThrough(Farm::class, FarmUser::class, 'user_id', 'id', 'id', 'farm_id');
    }

    /**
     * Get the full name based on the user's profile type
     */
    public function getFullNameAttribute()
    {
        switch ($this->profile) {
            case 'Farmer':
                if ($this->farmer) {
                    $fullname = trim($this->farmer->first_name . ' ' . $this->farmer->middle_name . ' ' . $this->farmer->surname);
                    return $fullname ?: '--';
                }
                break;

            case 'SystemUser':
                if ($this->systemUser) {
                    $fullname = trim($this->systemUser->first_name . ' ' . $this->systemUser->middle_name . ' ' . $this->systemUser->surname);
                    return $fullname ?: '--';
                }
                return $this->username;

            case 'ExtensionOfficer':
                if ($this->extensionOfficer) {
                    $fullname = trim($this->extensionOfficer->first_name . ' ' . $this->extensionOfficer->middle_name . ' ' . $this->extensionOfficer->surname);
                    return $fullname ?: '--';
                }
                return $this->username;

            default:
                return $this->username;
        }

        return $this->username;
    }

    public function getColor($status)
    {
        switch ($status) {
            case 'Active':
                return 'Success';
            case 'Inactive':
                return 'Danger';
            case 'Pending':
                return 'Warning';
            default:
                return 'Secondary';
        }
    }

    /**
     * Generate UUID if not provided and handle cascade deletes
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = \Illuminate\Support\Str::uuid()->toString();
            }
        });

        // Cascade delete pivot tables when user is deleted
        static::deleting(function ($user) {
            // Delete user-farm assignments
            $user->farmUsers()->delete();
        });
    }

    /**
     * Get the validation rules for the model
     */
    public static function rules(): array
    {
        return [
            'uuid' => 'required|string|unique:users,uuid,' . (request()->route('user') ?? 'NULL'),
        ];
    }
}
