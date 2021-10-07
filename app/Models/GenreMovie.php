<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
        'genre_name', 'genre_slug', 'genre_desc','genre_status'
    ];
    protected $primaryKey = 'genre_id';
 	protected $table = 'tbl_genre_movie';

    public function movie(){
        return $this->hasMany('App\Models\SeriMovie');
    }

    public function childrenGenre()
    {
        return $this->hasMany(CategoryMovie::class)->with('genre');
    }
}
