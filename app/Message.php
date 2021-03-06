<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
			'board_id', 'user_id', 'msg'
		];
    //ユーザー情報を取得
    public function user()
    {
      return $this->belongsTo('app\User');
    }
}
