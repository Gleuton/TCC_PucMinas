<?php

namespace App\Models;

use App\Events\ImpactedProcessEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImpactedProcess extends Model
{
    use SoftDeletes, UuidTrait;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'nonconformity_id',
        'process_id'
    ];
    protected $appends = [
        'nonconformity',
        'process'
    ];
    /**
     * @return BelongsTo
     */
    public function ncNonconformity(): BelongsTo
    {
        return $this->belongsTo(
            Nonconformity::class,
            'nonconformity_id'
        );
    }

    /**
     * @return BelongsTo
     */
    public function ncProcess(): BelongsTo
    {
        return $this->belongsTo(
            Process::class,
            'process_id'
        );
    }

    protected $dispatchesEvents = [
        'created' => ImpactedProcessEvent::class,
        'updated' => ImpactedProcessEvent::class,
        'deleted' => ImpactedProcessEvent::class
    ];

    public function getProcessAttribute()
    {
        return $this->ncProcess->name;
    }

    public function getNonconformityAttribute()
    {
        return $this->ncNonconformity->description;
    }
}
