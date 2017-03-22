<?php

namespace App;

use Illuminate\Support\Facades\DB;
//them DB de ket noi CSDL

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
    	'title_news',
    	'header',
    	'content',
    	'public',
    	'name_post',
    	'code_news',
        'created_at'
    ];
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at'] = Carbon::createFromFormat('d/m/Y',$date);
    }
}
