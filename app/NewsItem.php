<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    protected $dates = [
        'date',
    ];

    /*
     * Accessors and mutators
     */

    public function getActiveStatusAttribute(){
        return $this->attributes['active'] ? 'Yes' : 'No';
    }
}
