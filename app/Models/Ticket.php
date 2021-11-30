<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'deleted',
        'passenger_id',
        'schedule_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tickets/'.$this->getKey());
    }

    public function passenger(){
        return $this->belongsTo(Passenger::class,'passenger_id','id');
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class,'schedule_id','id');
    }
}
