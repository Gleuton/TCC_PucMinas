<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes, UuidTrait;
    protected $fillable = [
        'id',
        'name'
    ];

    /**
     * @return HasMany
     */
    public function nonConformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class);
    }

    /**
     * @return HasMany
     */
    public function impactedProcess(): HasMany
    {
        return $this->hasMany(ImpactedProcess::class);
    }
}
