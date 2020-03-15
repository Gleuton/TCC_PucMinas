<?php

namespace App\Models\Traits;

use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    public static function boot(): void
    {
        parent::boot();
        static::creating(
            static function ($obj){
            if (!$obj->id){
                $obj->id = Uuid::uuid4();
            }
        });
    }
}
