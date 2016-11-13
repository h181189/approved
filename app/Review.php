<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = ['app_id', 'score_id', 'content'];

	public function app() {
		return $this->belongsTo('App\App');
	}

	public function score() {
		return $this->belongsTo('App\Score');
	}
	
	public function user() {
		return $this->belongsTo('App\User');
	}
}
