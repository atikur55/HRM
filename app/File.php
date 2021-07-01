<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['emp_name' ,'file'];
    public function connect_users()
	{
	   return $this->belongsTo('App\User','emp_name');
	}
}
