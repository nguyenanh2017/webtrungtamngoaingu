<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permittion extends Model
{
    //protected $table = 'permittions';

    //protected $fillable = []
    public function find_name_permit($lv){
    	return DB::table('permittions')->where('level_permittion','=', $lv)->value('name_permit');
    }
}
