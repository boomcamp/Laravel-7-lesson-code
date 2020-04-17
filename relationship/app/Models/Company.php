<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "company"; //overide laravel table naming

   	public $timestamps = true; //automate the inserting and updating of timestamps

    /**
     * App\Models\Company::find($company_id)->company_instructor
     * 
     */
    public function company_instructor()
    {
        return $this->hasOne('App\Models\Company_Instructor');
    }

    /**
     * $result = App\Models\Company::find($company_id)->client
     */
    public function client()
    {
        return $this->hasMany('App\Models\Client');
    }
}

