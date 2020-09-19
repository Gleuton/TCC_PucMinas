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
    protected $appends = [
        'user',
        'type',
        'status',
        'process'
    ];
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
    public function ncUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function ncType(): BelongsTo
    {
        return $this->belongsTo(NcType::class,'type_id');
    }

    /**
     * @return BelongsTo
     */
    public function ncStatus(): BelongsTo
    {
        return $this->belongsTo(NcStatus::class, 'status_id');
    }
    /**
     * @return BelongsTo
     */
    public function ncProcess(): BelongsTo
    {
        return $this->belongsTo(Process::class,'process_id');
    }

    /**
     * @return HasMany
     */
    public function impactedProcess(): HasMany
    {
        return $this->hasMany(ImpactedProcess::class,'process_id');
    }
    protected $dispatchesEvents = [
        'created' => NonconformityEvent::class,
        'updated' => NonconformityEvent::class,
        'deleted' => NonconformityEvent::class
    ];

    public function getUserAttribute()
    {
        return $this->ncUser->name;
    }

    public function getTypeAttribute()
    {
        return $this->ncType->type;
    }

    public function getStatusAttribute()
    {
        return $this->ncStatus->status;
    }

    public function getProcessAttribute()
    {
        return $this->ncProcess->name;
    }

}
