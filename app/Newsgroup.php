<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Newsgroup extends Model
{
	
	protected $fillable = [
		'code_newsgroup',
		'name_group',
		'content'
	];

    public function find_name_group($code){
    	return DB::table('newsgroups')->where('code_newsgroup',$code)->value('name_group');  		 
    }
}
