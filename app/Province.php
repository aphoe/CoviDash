<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    //

    /*
     * Accessors and mutators
     */

    public function getActiveStatusAttribute(){
        return $this->attributes['active'] ? 'Yes' : 'No';
    }

    /*
     * Relationship
     */

    /**
     * Incidences in the province
     * @return HasMany
     */
    public function incidences(): HasMany
    {
        return $this->hasMany(Incidence::class);
    }
}
