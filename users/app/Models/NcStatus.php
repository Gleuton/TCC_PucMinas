<?php

namespace App\Models;

use App\Events\NcStatusEvent;
use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NcStatus extends Model
{
    use SoftDeletes, UuidTrait;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'nc_status';
    protected $fillable = [
        'id',
        'status'
    ];

    /**
     * @return HasMany
     */
    public function nonConformities(): HasMany
    {
        return $this->hasMany(Nonconformity::class);
    }

    protected $dispatchesEvents = [
        'created' => NcStatusEvent::class,
        'updated' => NcStatusEvent::class,
        'deleted' => NcStatusEvent::class
    ];
}
