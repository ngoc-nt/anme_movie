<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'seri_id', 'customer_name', 'comment_content','comment_movie_rating','comment_parent_comment','comment_status','created_at'
    ];
    protected $primaryKey = 'comment_id';
 	protected $table = 'tbl_comment';

 	public function seri(){
 		return $this->belongsTo('App\Models\SeriMovie','seri_id');
 	}
}
