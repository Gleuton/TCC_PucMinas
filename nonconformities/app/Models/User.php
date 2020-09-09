<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model
    implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'login',
        'user_type_id',
        'api_token',
        'api_token_expiration',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $dates = ['api_token_expiration'];
    /**
     * @return BelongsTo
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    /**
     * @return HasMany
     */
    public function nonconformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class);
    }

    public function isAdmin(): bool
    {
        return (strtolower($this->userType->type) === 'administrador');
    }

    public function isQualityManager(): bool
    {
        return (strtolower($this->userType->type) === 'gerente de qualidade');
    }
}
