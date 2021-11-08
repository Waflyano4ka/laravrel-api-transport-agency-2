<?php

namespace App\Models;

use Illuminate\Database\Eloquent;

class Model extends Eloquent\Model
{
    protected $fillable = [
        'deleted',
        'model_name',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/models/'.$this->getKey());
    }
}
