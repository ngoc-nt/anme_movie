<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    public $timestamps = false; //set time to false
    protected $fillable = [
    	'admin_email','admin_name','admin_phone','admin_password','admin_status'
    ];
    protected $primaryKey = 'admin_id';
 	protected $table = 'tbl_admin';

 	public function roles(){
 		return $this->belongsToMany('App\Models\Roles');
 	}

 	public function getAuthPassword(){
 		return $this->admin_password;
 	}

 	public function hasAnyRoles($roles){
 		return null !==  $this->roles()->whereIn('name',$roles)->first();
 	}
 	public function hasRole($role){
 		return null !==  $this->roles()->where('name',$role)->first();
 	}


}
