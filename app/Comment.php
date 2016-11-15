<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'review_id', 'content'];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
