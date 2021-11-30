<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeUser extends Model
{
    protected $fillable = [
        'deleted',
        'office_id',
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
        return url('/admin/office-users/'.$this->getKey());
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function office(){
        return $this->belongsTo(Office::class,'office_id','id');
    }
}
