<?php

namespace App\Models;

use Illuminate\Database\Eloquent;

class Transport extends Eloquent\Model
{
    protected $fillable = [
        'car_number',
        'deleted',
        'model_id',
        'total_seats',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/transports/'.$this->getKey());
    }

    public function model(){
        return $this->belongsTo(Model::class,'model_id','id');
    }
}
