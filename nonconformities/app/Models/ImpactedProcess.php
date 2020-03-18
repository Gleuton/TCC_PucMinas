<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImpactedProcess extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nonconformity_id',
        'process_id'
    ];

    /**
     * @return HasOne
     */
    public function nonconformity(): HasOne
    {
        return $this->hasOne(Nonconformity::class);
    }
    /**
     * @return HasOne
     */
    public function process(): HasOne
    {
        return $this->hasOne(Process::class);
    }
}
