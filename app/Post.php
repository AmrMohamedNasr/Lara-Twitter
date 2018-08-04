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
     * The attributes to get from our DB.
     *
     * @var array
     */
	protected $appends = ['createdDate'];
    /**
	* Relation to the user model.
    **/
    public function user() {
    	return $this->belongsTo(User::class);
    }
    /** 
    * Function to return date.
    **/
    public function getCreatedDateAttribute() {
    	return $this->created_at->diffForHumans();
    }
}
