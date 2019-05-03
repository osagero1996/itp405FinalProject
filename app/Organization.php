<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $primaryKey = 'OrganizationId';
     public $timestamps = false;

     public function events(){
        return $this->hasMany('App\Event', 'EventId');
    }
}
