<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'priority',
        'descripition',
        'interruption_id',
        'sector_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return HasMany
     */
    public function nonConformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class);
    }

    /**
     * @return HasOne
     */
    public function interruption(): HasOne
    {
        return $this->hasOne(Interruption::class);
    }

    /**
     * @return HasOne
     */
    public function sector(): HasOne
    {
        return $this->hasOne(Sector::class);
    }
}
