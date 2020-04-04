<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'scheduling',
        'description',
        'scheduling_date',
        'nonconformity_id',
        'schedule_type_id',
        'schedule_status_id',
        'scheduler_id',
        'performer_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $dates = ['scheduling_date'];

    /**
     * @return BelongsTo
     */
    public function scheduleType(): BelongsTo
    {
        return $this->belongsTo(ScheduleType::class);
    }

    /**
     * @return BelongsTo
     */
    public function scheduleStatus(): BelongsTo
    {
        return $this->belongsTo(ScheduleStatus::class);
    }

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
    public function performer():BelongsTo
    {
        return $this->belongsTo(Performer::class);
    }

    /**
     * @return BelongsTo
     */
    public function scheduler():BelongsTo
    {
        return $this->belongsTo(Scheduler::class);
    }
}
