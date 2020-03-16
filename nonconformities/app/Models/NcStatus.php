<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NcStatus extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';

    protected $table = 'nc_status';
    protected $fillable = [
        'id',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function nonConformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class);
    }
}
