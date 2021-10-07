<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'banner_name', 'banner_url','banner_images','banner_status'
    ];
    protected $primaryKey = 'banner_id ';
 	protected $table = 'tbl_banner';
}
