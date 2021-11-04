<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $fillable = ['departure_city_id', 'arrival_city_id', 'distance', 'user_id'];

    public function departureСity(){
        return $this->belongsTo(City::class,'departure_city_id','id');
    }
    public function arrivalСity(){
        return $this->belongsTo(City::class,'arrival_city_id','id');
    }
}