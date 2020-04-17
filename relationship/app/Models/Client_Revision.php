<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client_Revision extends Model
{
    public $timestamps = true; //automate the inserting and updating of timestamps

    protected $table = "client_revision"; //overide laravel table naming


}
