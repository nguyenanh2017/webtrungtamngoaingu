<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders'; 
    //co con hay khong
    public function is_childs(){
    	return $this->hasMany('App\Folder','id_parent','id_fd');
    }
}
