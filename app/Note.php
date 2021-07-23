<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable=['lead_id','messaggio'];
    public function lead(){
        return $this->belongsTo('App\Lead');
    }
}
