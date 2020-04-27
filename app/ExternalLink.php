<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalLink extends Model
{
    //

    /*
     * Accessors and mutators
     */

    public function getActiveStatusAttribute(){
        return $this->attributes['active'] ? 'Yes' : 'No';
    }
}
