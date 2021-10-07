<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'news_name', 'news_slug', 'news_image','news_view','comment_parent_comment','comment_status	','created_at'
    ];
    protected $primaryKey = 'news_id ';
 	protected $table = 'tbl_news';
}
