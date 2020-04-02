<?php

namespace App\Models;

use App\Events\SectorEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sector extends Model
{
    use SoftDeletes, UuidTrait;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'sector',
        'description'
    ];

    /**
     * @return HasMany
     */
    public function processes(): HasMany
    {
        return $this->hasMany(Process::class);
    }

    protected $dispatchesEvents = [
        'created' => SectorEvent::class,
        'updated' => SectorEvent::class,
        'deleted' => SectorEvent::class
    ];
}
