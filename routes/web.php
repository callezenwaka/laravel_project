<?php
//PUBLIC PAGE ROUTES


Route::group(['namespace' => 'User'], function(){
	//Home Routes ,'middleware' => 'auth'
	Route::get('/','HomeController@index')->name('home');
	Route::get('about','HomeController@about')->name('about');
	// Route::get('contact','HomeController@contact')->name('contact');
	Route::get('NFCS_Anthem','HomeController@anthem')->name('anthem');
	Route::get('NFCS_Prayer','HomeController@prayer')->name('prayer');
	Route::get('History_of_NFCS','HomeController@nfcs')->name('nfcs');

	//Assistant Chaplain Routes
	Route::get('assistant_chaplain','AssistChaplainController@assistChaplain')->name('assistant_chaplain');
	Route::get('assistant_chaplain/index','AssistChaplainController@index')->name('assistant_chaplain.index_user');
	Route::get('assistant_chaplain/{slug}','AssistChaplainController@show')->name('assistant_chaplain.show_user');

	//Chaplain Routes
	Route::get('chaplain','ChaplainController@chaplain')->name('chaplain');
	Route::get('chaplain/index','ChaplainController@index')->name('chaplain.index_user');
	Route::get('chaplain/{slug}','ChaplainController@show')->name('chaplain.show_user');

	//Post Routes
	Route::get('post','PostController@post')->name('post');
	Route::get('post/index','PostController@index')->name('post.index_user');
	Route::get('post/{slug}','PostController@show')->name('post.show_user');

	//Blog Routes
	Route::get('blog','BlogController@blog')->name('blog_user');
	Route::get('blog/index','BlogController@index')->name('blog.index_user');
	Route::get('blog/{slug}','BlogController@show')->name('blog.show_user');

	//Society Routes
	Route::get('society','SocietyController@society')->name('society');
	Route::get('society/index','SocietyController@index')->name('society.index_user');
	Route::get('society/{slug}','SocietyController@show')->name('society.show_user');

	//Homily Routes
	Route::get('homily','HomilyController@homily')->name('homily');
	Route::get('homily/index','HomilyController@index')->name('homily.index_user');
	Route::get('homily/{slug}','HomilyController@show')->name('homily.show_user');


	//Executive Routes
	Route::get('executive','ExecutiveController@executive')->name('executive');
	Route::get('executive/index','ExecutiveController@index')->name('executive.index_user');
	Route::get('executive/{slug}','ExecutiveController@show')->name('executive.show_user');

	//Contact Routes
	Route::get('contact','ContactController@create')->name('contact.create');
	Route::post('contact','ContactController@store')->name('contact.store');

	//Subscription Route
	Route::post('subscription','SubscriptionController@store')->name('subscription.store');
});

Auth::routes();

Route::group(['namespace' => 'User'], function(){
//User Route ,'middleware' => 'auth']
Route::put('user/{slug}/image','UserController@update_image')->name('user.image_update');
Route::get('user/{slug}/edit_image','UserController@edit_image')->name('user.image_edit');
Route::put('user/{slug}','UserController@update')->name('user.update_user');
Route::get('user/{slug}','UserController@show')->name('user.show_user');
Route::get('user/{slug}/edit','UserController@edit')->name('user.edit_user');
Route::put('user/{{Auth::user()->id}}/updateImage','UserController@updateImage');
});

//verify Email Route
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');


Route::group(['namespace' => 'Admin'],function(){
	//Home Routes ,'middleware' => 'auth:admin'
	Route::get('admin/dashboard','HomeController@index')->name('admin.dashboard');

	//Chaplain Routes
	Route::resource('admin/chaplain', 'ChaplainController');

	//AssistChaplain Routes
	Route::resource('admin/assistChaplain', 'AssistChaplainController');

	//Societies Routes
	Route::resource('admin/society', 'SocietyController');

	//Role Routes
	Route::resource('admin/role', 'RoleController');

	//Permission Routes
	Route::resource('admin/permission', 'PermissionController');

	//Permission Routes
	Route::resource('admin/category', 'CategoryController');

	//Permission Routes
	Route::resource('admin/tag', 'TagController');

	//Blog Routes
	Route::resource('admin/blog', 'BlogController');

	//Post Routes
	Route::resource('admin/post', 'PostController');

	//Homily Routes
	Route::resource('admin/homily', 'HomilyController');

	//Admin Routes
	Route::resource('admin/admin', 'AdminController');

	//Executive Routes
	Route::resource('admin/executive', 'ExecutiveController');

	//User Routes
	Route::get('user','UserController@index')->name('user.index');
	// Route::get('user/{slug}','UserController@show')->name('user.show');
	Route::delete('user/{slug}','UserController@destroy')->name('user.destroy');

	//Admin Auth Routes
	Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');

	Route::post('admin-login', 'Auth\LoginController@login');

	Route::post('admin-logout', 'Auth\LoginController@logout')->name('admin.logout');
});

