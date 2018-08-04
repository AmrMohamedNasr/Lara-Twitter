<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['user_id', 'body'];
    /**
	* Relation to the user model.
    **/
    public function users() {
    	return $this->belongsTo(User::class);
    }
}
