<?php

namespace App\Models;

use App\Events\InterruptionEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'process_id'
    ];
    /**
     * @return BelongsTo
     */
    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
    protected $dispatchesEvents = [
        'created' => InterruptionEvent::class,
        'updated' => InterruptionEvent::class,
        'deleted' => InterruptionEvent::class
    ];
}
