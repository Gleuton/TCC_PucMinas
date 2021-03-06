<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NcType extends Model
{
    use SoftDeletes, UuidTrait;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'type'
    ];

    /**
     * @return HasMany
     */
    public function nonConformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class,'id','nc_type_id');
    }
}
