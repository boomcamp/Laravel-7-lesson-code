<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    public $timestamps = true; //automate the inserting and updating of timestamps

    protected $table = "revision"; //overide laravel table naming


    /**
     * $result = App\Models\Revision::find($revision_id)->clients
     */
    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
}
