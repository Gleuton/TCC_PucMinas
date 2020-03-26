<?php

namespace App\Models;

use App\Events\NcTypeEvent;
use App\Events\NonconformityEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nonconformity extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'description',
        'solution',
        'standard',
        'user_id',
        'type_id',
        'status_id',
        'process_id'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(NcType::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(NcStatus::class);
    }
    /**
     * @return belongsTo
     */
    public function process(): belongsTo
    {
        return $this->belongsTo(Process::class);
    }

    /**
     * @return HasMany
     */
    public function impactedProcess(): HasMany
    {
        return $this->hasMany(ImpactedProcess::class);
    }
    protected $dispatchesEvents = [
        'created' => NonconformityEvent::class,
        'updated' => NonconformityEvent::class,
        'deleted' => NonconformityEvent::class
    ];
}
