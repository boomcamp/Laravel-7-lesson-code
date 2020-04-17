<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{	  
	 public $timestamps = true;
	 
     protected $fillable = ['fullname', 'course_handle'];
}
