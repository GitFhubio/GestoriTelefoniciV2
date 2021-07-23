<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable=['offer_name','nome','cognome','telefono','email','status'];

    public function offer(){
        return $this->belongsTo('App\Offer');
    }
    public function notes(){
        return $this->hasMany('App\Note');
    }
    public function getCreatedAtAttribute($value){
        $date=new Carbon($value);
        $date=$date->format('d F Y');
        return $date;
    }
}
