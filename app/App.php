<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['name', 'developer', 'url'];

	public function review() {
		return $this->hasMany('App\Review');
	}
}
