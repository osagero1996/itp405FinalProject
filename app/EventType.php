<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $primaryKey = 'EventTypeId';
    public $timestamps = false;

    public function events(){
        return $this->hasMany('App\Event', 'EventId');
    }

}
