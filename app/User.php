<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

	protected $fillable = ['firstName','lastName','email','username','password'];

}
