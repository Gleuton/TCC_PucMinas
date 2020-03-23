<?php

namespace App\Models;

use App\Events\UserTypeEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserType extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'type'
    ];
    public function Users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    protected $dispatchesEvents = [
        'created' => UserTypeEvent::class,
        'updated' => UserTypeEvent::class,
        'deleted' => UserTypeEvent::class
    ];
}
