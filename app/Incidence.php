<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidence extends Model
{
    protected $dates = [
        'day',
    ]

    /*
     * Relationships
     */

    /**
     * Province where cases  were recorded
     * @return BelongsTo
     */
    public function  province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
