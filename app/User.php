<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use \App\Notifications\CustomResetPassword;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'pic', 'username', 'comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // パスワードリセット通知の送信
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new CustomResetPassword($token));
    }
    
    
    //投稿情報取得(UserController)
    public function steps()
    {
      return $this->hasMany('App\Step',);
    }
    //カテゴリー情報取得
    public function category()
    {
      return $this->belongsToMany('App\Category', 'App\Step',);
    }
    
    public function likes()
    {
      return $this->belongsToMany('App\Step', 'likes', 'user_id', 'article_id')->withTimestamps();
    }
    //ログインユーザーのコメントのある掲示板を取得
    public function boards()
    {
      return $this->belongsToMany('App\Board', 'messages');
    }
    //ログインユーザーのコメント情報を取得
    public function messages()
    {
      return $this->hasMany('App\Message');
    }
}
