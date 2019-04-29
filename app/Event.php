<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     //
     protected $primaryKey = 'EventId';
     public $timestamps = false;

     public function EventType(){
          return $this->belongsTo('App\EventType', 'EventTypeId');
     }
}
