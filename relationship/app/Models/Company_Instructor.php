<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company_Instructor extends Model
{
	public $timestamps = true; //automate the inserting and updating of timestamps

    protected $table = "company_instructor"; //overide laravel table naming

    protected $fillable = ['name']; //Fillable name field
    /**
     * App\Models\Company_Instructor::find($company_id)->company
     *
     * $result = App\Models\Company_Instructor::where('company_id','=', $company_id)->first
     * $result->company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
