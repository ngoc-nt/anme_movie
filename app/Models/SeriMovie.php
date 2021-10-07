<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriMovie extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'seri_name', 'seri_name_slug','category_id','genre_id','seri_desc','seri_country','seri_duration','seri_quality','seri_year','seri_number','seri_old',
        'seri_image','seri_status','seri_views'
    ];
    protected $primaryKey = 'seri_id';
 	protected $table = 'tbl_seri_movie';

 	public function movies(){
 		return $this->hasMany(Movie::class, 'seri_id', 'seri_id');
 	}
    public function seri_movie_cate(){
        return $this->belongsTo(CategoryMovie::class, 'category_id', 'category_id');
    }
    public function danhmuc(){
        return $this->belongsTo('App\Models\CategoryMovie','category_id');
    }
    public function theloai(){
        return $this->belongsTo('App\Models\GenreMovie','genre_id');
    }
}
