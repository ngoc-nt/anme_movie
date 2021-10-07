<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'movie_name', 'seri_id','movie_desc', 'movie_image', 'movie_url','movie_desc','movie_status'
    ];
    protected $primaryKey = 'movie_id ';
 	protected $table = 'tbl_movie';

 	public function seri_movie(){
 		return $this->belongsTo(SeriMovie::class, 'seri_id', 'seri_id');
 	}
}
