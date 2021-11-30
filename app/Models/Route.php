<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = [
        'arrival_city_id',
        'deleted',
        'departure_city_id',
        'distance',
        'user_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/routes/'.$this->getKey());
    }

    public function departureСity(){
        return $this->belongsTo(City::class,'departure_city_id','id');
    }
    public function arrivalСity(){
        return $this->belongsTo(City::class,'arrival_city_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
