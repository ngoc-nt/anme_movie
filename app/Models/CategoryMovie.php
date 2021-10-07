<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'category_name', 'category_slug', 'category_desc','category_status'
    ];
    protected $primaryKey = 'category_id';
 	protected $table = 'tbl_category_movie';

     public function cate_movies(){
        return $this->hasMany(SeriMovie::class, 'category_id', 'category_id');
    }
    public function childrenCategories()
    {
        return $this->hasMany(CategoryMovie::class)->with('categories');
    }
}
