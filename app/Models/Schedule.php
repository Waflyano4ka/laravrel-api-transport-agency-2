<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'confirmed',
        'cost',
        'date',
        'deleted',
        'route_id',
        'time',
        'transport_id',

    ];


    protected $dates = [
        'created_at',
        'date',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/schedules/'.$this->getKey());
    }

    public function transport(){
        return $this->belongsTo(Transport::class,'transport_id','id');
    }
    public function route(){
        return $this->belongsTo(Route::class,'route_id','id');
    }
}
