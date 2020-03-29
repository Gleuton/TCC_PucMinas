<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interruption extends Model
{
    use SoftDeletes, UuidTrait;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'description',
        'work_shift',
        'interruption_type_id'
    ];

    /**
     * @return BelongsTo
     */
    public function interruptionType(): BelongsTo
    {
        return $this->belongsTo(InterruptionType::class);
    }
    /**
     * @return BelongsTo
     */
    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
    protected $dispatchesEvents = [
//        'created' => NcTypeEvent::class,
//        'updated' => NcTypeEvent::class,
//        'deleted' => NcTypeEvent::class
    ];
}
