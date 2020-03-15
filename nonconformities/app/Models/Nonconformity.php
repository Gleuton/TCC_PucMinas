<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nonconformity extends Model
{
    use SoftDeletes, UuidTrait;
    protected $fillable = [
        'id',
        'description',
        'solution',
        'standard',
        'id_user',
        'id_type',
        'id_status',
        'id_process'
    ];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return HasOne
     */
    public function type(): HasOne
    {
        return $this->hasOne(NcType::class);
    }

    /**
     * @return HasOne
     */
    public function status(): HasOne
    {
        return $this->hasOne(NcStatus::class);
    }
    /**
     * @return HasOne
     */
    public function process(): HasOne
    {
        return $this->hasOne(Process::class);
    }

    /**
     * @return HasMany
     */
    public function impactedProcess(): HasMany
    {
        return $this->hasMany(ImpactedProcess::class);
    }
}
