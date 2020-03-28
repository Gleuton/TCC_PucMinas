<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class InterruptionType extends Model
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
    public function interruptions(): HasMany
    {
        return $this->hasMany(Interruption::class);
    }

    protected $dispatchesEvents = [
//        'created' => NcTypeEvent::class,
//        'updated' => NcTypeEvent::class,
//        'deleted' => NcTypeEvent::class
    ];
}
