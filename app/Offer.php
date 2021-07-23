<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable=['name','user_id','costo_mensile','descrizione','data_inizio','data_fine'];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function leads(){
        return $this->hasMany('App\Lead');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function getDataInizioAttribute($value){
        $date=new Carbon($value);
        $date=$date->format('d F Y');
        return $date;
    }
    public function getDataFineAttribute($value){
        $date=new Carbon($value);
        $date=$date->format('d F Y');
        return $date;
    }
}
