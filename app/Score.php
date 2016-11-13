<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['functionality', 'interface', 'price'];

    public function review() {
    	return $this->hasOne('App\Review');
    }
}
