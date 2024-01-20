<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\AutoGenerateUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, AutoGenerateUuid;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
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
    ];

    /**
     * The roles that belong to the user.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * The primary account that belong to the user.
     *
     * @return BelongsTo
     */
    public function account() : BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
    /**
     * The accounts that belong to the user.
     *
     * @return BelongsToMany
     */
    public function accounts(): BelongsToMany
    {
        return $this->belongsToMany(Account::class);
    }

    /**
     * The alerts that belong to the user.
     *
     * @return BelongsTo
     */
    public function hasAlerts()
    {
        return random_int(0,1);
    }

    /**
     * Get if the user is admin or not.
     *
     * @return BelongsTo
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    public function addRole($role = null){
        if($role){
            $role = Role::where('key',$role)->value('id');
            if(!$role){
                return false;
            }
            try {
                $this->roles()->attach($role);
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }else{
            return false;
        }
    }


    public function storeRolesSession()
    {
        foreach ($this->roles as $role) {
            $roles[] = $role->key;
        }
        session(['user.roles' => $roles]);
    }


    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }


    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }


    public function hasRole($role)
    {
        if (!session()->has('user.roles')) {
            $this->storeRolesSession();
        }
        if (in_array($role, session()->get('user.roles'))) {
            return true;
        }
        return false;
    }


    public function getInitialsAttribute()
    {
        $words = explode(' ', $this->name);
        if (count($words) >= 2) {
            return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
        }
        preg_match_all('#([A-Z]+)#', $this->name, $capitals);
        if (count($capitals[1]) >= 2) {
            return substr(implode('', $capitals[1]), 0, 2);
        }
        return strtoupper(substr($this->name, 0, 2));
    }


    public function applyTimeZone($dateTime)
    {
        if ($this->timezone == '') {
            $this->timezone = config('app.timezone');
            $this->save();
        }
        return Carbon::parse($dateTime)->timezone($this->timezone)->format($this->date_format ?? 'd/m/Y');
    }


    public function applyDateTimeZoneFormat($dateTime = null, $format = null, $timezone = null)
    {
        $timezone = $timezone ?? $this->timezone ?? config('app.timezone');
        $format = $format ?? ($this->date_format . ' ' . $this->hour_format) ?? 'd/m/Y H:i:s';
        return Carbon::parse($dateTime ?? now())->timezone($timezone)->format($format);
    }


    public function applyDateFormat($date = null)
    {
        if ($date != null) {
            return Carbon::parse($date)->format($this->date_format ?? 'd/m/Y');
        } else {
            return $this->date_format ?? 'd/m/Y';
        }
    }


    public function applyCurrencyFormat($amount, $decimals = 2)
    {
        $thousandsPointer = $this->decimals_pointer == ',' ? '.' : ',';
        return number_format($amount, $decimals, $thousandsPointer, $this->decimals_pointer);
    }
}
