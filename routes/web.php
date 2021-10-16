<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//トップページ
Route::get('', 'HomeController@index')->name('home');
//記事
Route::resource('steps', 'StepController')->except(['index', 'show'])->middleware('auth');
Route::resource('steps', 'StepController')->only('index', 'show');
//お気に入り
Route::prefix('steps/')->name('steps.')->group(function() {
	Route::put('{step}/like', 'StepController@like')->name('like');
	Route::delete('/{step}/like', 'StepController@unlike')->name('unlike');
});
//認証
Auth::routes();
//外部サービスログイン
Route::prefix('login')->name('login.')->group(function() {
	Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('{provider}');
	Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('{provider}.callback');
});
//外部サービス会員登録
Route::prefix('register')->name('register.')->group(function() {
	Route::get('/{provider}', 'Auth\RegisterController@showProviderUserRegistrationForm')->name('{provider}');
	Route::post('/{provider}', 'Auth\RegisterController@registerProviderUser')->name('{provider}');
});
//マイページ
Route::prefix('mypage/')->name('mypage')->group(function() {
	Route::get('', 'UserController@getMypage')->name('')->middleware('auth');
	Route::get('steps', 'UserController@steps')->name('.steps')->middleware('auth');
	Route::get('likes', 'UserController@likes')->name('.likes')->middleware('auth');
	Route::get('messages', 'UserController@messages')->name('.messages')->middleware('auth');
});
//パスワード変更
Route::get('passEdit', 'UserController@getPassEdit')->name('passEdit')->middleware('auth');
Route::post('passEdit', 'UserController@postPassEdit')->name('passEdit')->middleware('auth');
//プロフィール編集
Route::get('profEdit', 'UserController@getProfEdit')->name('profEdit')->middleware('auth');
Route::post('profEdit', 'UserController@postProfEdit')->name('profEdit')->middleware('auth');
//退会
Route::get('leave', 'UserController@getLeave')->name('leave')->middleware('auth');
Route::post('leave', 'UserController@postLeave')->name('leave')->middleware('auth');
//お問い合わせ
Route::prefix('contact')->name('contact.')->group(function() {
	Route::get('', 'ContactController@index')->name('index');
	Route::post('/confirm', 'ContactController@confirm')->name('confirm');
	Route::post('/thanks', 'ContactController@send')->name('send');
});
//掲示板メッセージ
Route::post('messages/{board}', 'UserController@postMessage')->name('messages')->middleware('auth');
//利用規約
Route::get('privacy', 'PrivacyController@index')->name('privacy');
//プライバシーポリシー
Route::get('rule', 'RuleController@index')->name('rule');
//ユーザーページ
Route::get('user/{user}', 'UserController@user')->name('user');