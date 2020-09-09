<?php

namespace App\Models;

use App\Events\UserEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model
    implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes, UuidTrait;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $appends = ['type'];

    protected $hidden = [
        'password'
    ];
    protected $fillable = [
        'id',
        'name',
        'login',
        'password',
        'user_type_id',
    ];

    protected $dates = ['api_token_expiration'];

    /**
     * @return BelongsTo
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = app('hash')->make($value);
    }

    protected $dispatchesEvents = [
        'created' => UserEvent::class,
        'updated' => UserEvent::class,
        'deleted' => UserEvent::class
    ];

    public function isAdmin(): bool
    {
        return (strtolower($this->userType->type) === 'administrador');
    }

    public function getTypeAttribute()
    {
        return $this->userType->type;
    }
}
