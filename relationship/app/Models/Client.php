<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = true; //automate the inserting and updating of timestamps

    protected $table = "client"; //overide laravel table naming

    /**
     * App\Models\Client::find($company_id)->company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    /**
     * $result = App\Models\Client::find($client_id)->revisions
     */
    public function revisions()
    {
        return $this->belongsToMany('App\Models\Revision');
    }
}
