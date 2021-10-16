<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;



class Step extends Model
{
    protected $fillable = [
			'name', 'category_id', 'comment', 'user_id',
		];
    //カテゴリー情報を取得
    public function category()
    {
      return $this->belongsTo('App\Category');
    }
    //ユーザー情報を取得
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    //メッセージ情報を取得
    public function msgs()
    {
      return $this->hasManyThrough('App\Message', 'App\Board', 'article_id', 'board_id');
    }
    //掲示板情報を取得
    public function board()
    {
      return $this->hasOne('App\Board', 'article_id');
    }
    //お気に入り登録済みユーザーを取得
    public function likes()
    {
      return $this->belongsToMany('App\User', 'likes', 'article_id')->withTimestamps();
    }
    //ログインユーザーのお気に入り登録有無
    public function isLikedBy(?User $user)
    {
      return $user ? (bool)$this->likes->where('id', $user->id)->count() : false;
    }
}
