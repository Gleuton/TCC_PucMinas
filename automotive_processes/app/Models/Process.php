<?php

namespace App\Models;

use App\Events\ProcessEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * @return HasMany
     */
    public function interruptions(): HasMany
    {
        return $this->hasMany(Interruption::class);
    }

    /**
     * @return BelongsTo
     */
    public function sector(): BelongsTo
    {
        return $this->belongsTo(Sector::class);
    }
    protected $dispatchesEvents = [
        'created' => ProcessEvent::class,
        'updated' => ProcessEvent::class,
        'deleted' => ProcessEvent::class
    ];
}
