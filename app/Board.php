<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
	protected $fillable = [
		'article_id'
	];
	
	public function msgs()
	{
		return $this->hasMany('App\Message');
	}
	
	public function step()
	{
		return $this->belongsTo('App\Step', 'article_id');
	}
	
	// public function step()
	// {
	// 	return $this->belongsToMany('App\Step', 'messages', 'board_id', 'user_id', 'id', 'user_id')->withPivot('msg');
	// }
	//
	public function message()
	{
		return $this->hasOne('App\Message')->orderBy('created_at', 'desc');
	}
}
