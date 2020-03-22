<?php

namespace App\Models;

use App\Events\ImpactedProcessEvent;
use App\Events\NcStatusEvent;
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

    /**
     * @return BelongsTo
     */
    public function nonconformity(): BelongsTo
    {
        return $this->belongsTo(Nonconformity::class);
    }
    /**
     * @return BelongsTo
     */
    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
    protected $dispatchesEvents = [
        'created' => ImpactedProcessEvent::class,
        'updated' => ImpactedProcessEvent::class,
        'deleted' => ImpactedProcessEvent::class
    ];
}
