<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'api_token',
        'birthday',
        'deleted',
        'dismissed',
        'email',
        'first_name',
        'inn',
        'passport_number',
        'passport_series',
        'password',
        'scan',
        'second_name',
        'surname',
    
    ];
    
    protected $hidden = [
        'password',
    
    ];
    
    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/users/'.$this->getKey());
    }
}
