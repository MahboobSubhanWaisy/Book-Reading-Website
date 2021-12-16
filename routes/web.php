<?php

use Illuminate\Support\Facades\Route;

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


//---------------------- LOGIN --------------------------//

	Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login','Auth\LoginController@login')->name('login');
	Route::get('/register','Auth\LoginController@register')->name('register');
	Route::post('/register','Auth\RegisterController@register')->name('register');
	Route::get('/logout','Auth\LoginController@logout')->name('logout');

//---------------------- LOGIN --------------------------//


/*
|--------------------------------------------------------------------------
| Localization Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/english','welcome@english')->name('english');
Route::get('/dari','welcome@dari')->name('dari');
Route::get('/pashto','welcome@pashto')->name('pashto');


/*
|--------------------------------------------------------------------------
| Frontends Routes
|--------------------------------------------------------------------------
|
|
*/

Route::middleware(['localize'])->group(function(){
	Route::get('/','welcome@index')->name('default');
	Route::get('/view-all-books','welcome@books')->name('fbooks');
	Route::get('/fevorite/{id?}','welcome@favorite')->name('ffev');
	Route::get('/book-liked','welcome@book_liked')->name('book_liked');
	Route::get('/contact-us','welcome@contact_us')->name('contact_us');
	Route::get('/book_information/{id?}','welcome@book_information')->name('information');
	Route::get('/sign-in','welcome@signin')->name('signin');
	Route::get('/sign-up','welcome@signup')->name('signup');
	Route::post('/sign-up/register','welcome@register')->name('client_register');
	Route::post('/sign-in/login','Auth\ClientLoginController@login')->name('client.login');
	Route::get('/sign-out','Auth\ClientLoginController@signout')->name('client.signout');
	Route::post('/books/download','Backends\books@download')->name('download_pdf');
	Route::post('/post-comment','Backends\Books@postComment')->name('comment');
	Route::post('/search-book', 'welcome@searchBook')->name('search-book');
	Route::get('/my-profile','welcome@profileEdit')->name('profile');
	Route::post('/update-client-profile', 'welcome@profileUpdate')->name('update-profile');
});


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
|
*/
Route::group(['middleware' => ['auth:web']], function () {

	Route::get('/dashboard','Backends\welcome@index')->name('dashboard');


	// Route::get('/books','Backends\books@index')->name('books');

	/*
	|--------------------------------------------------------------------------
	| BOOKS ROUTES
	|--------------------------------------------------------------------------
	*/
	Route::get('/books','Backends\books@index')->name('books');
	Route::get('/books/create','Backends\books@new')->name('new-book');
	Route::post('/books/insert','Backends\books@insert')->name('insert-book');
	Route::get('/books/books-edit/{id?}','Backends\books@edit')->name('edit-book');
	Route::post('/books/books-update/{id?}','Backends\books@update')->name('update-book');
	Route::post('/books/books-delete/{id?}','Backends\books@delete')->name('delete-book');
	Route::get('/books/books-info/{id?}','Backends\books@view')->name('view-book');
	

	/*
	|--------------------------------------------------------------------------
	| AUTHORS ROUTES
	|--------------------------------------------------------------------------
	*/
	Route::get('/authors','Backends\authors@index')->name('authors');
	Route::get('/authors/create','Backends\authors@new_author')->name('new_author');
	Route::post('/authors/insert','Backends\authors@insert_author')->name('insert_author');
	Route::get('/authors/authors-edit/{id?}','Backends\authors@edit_author')->name('edit_author');
	Route::post('/authors/authors-update/{id?}','Backends\authors@update_author')->name('update_author');
	Route::post('/authors/authors-delete/{id?}','Backends\authors@delete_author')->name('delete_author');
	Route::get('/authors/authors-bio/{id?}','Backends\authors@view_author')->name('view_author');

	/*
	|--------------------------------------------------------------------------
	| CATEGORIES ROUTES
	|--------------------------------------------------------------------------
	*/
	Route::get('/categories','Backends\category@index')->name('categories');
	Route::get('/categories/add-new-category','Backends\category@new')->name('add-category');
	Route::post('/categories/insert','Backends\category@insert')->name('insert-category');
	Route::get('/categories/edit-category/{id?}','Backends\category@edit')->name('edit-category');
	Route::post('/categories/update-category/{id?}','Backends\category@update')->name('update-category');
	Route::post('/categories/delete-category/{id?}','Backends\category@delete')->name('delete_category');
		
	// Auth::routes();
	//---------------------- USERS LIST--------------------------//

	Route::get('/users','Backends\users@index')->name('users');
	Route::get('/users/add-new-user','Backends\users@new')->name('add-user');
	Route::post('/users/insert','Backends\users@insert')->name('insert-user');
	Route::get('/users/edit-user/{id?}','Backends\users@edit')->name('edit-user');
	Route::post('/users/update-user/{id?}','Backends\users@update')->name('update-user');
	Route::post('/users/delete-user/{id?}','Backends\users@delete')->name('delete_user');
	//---------------------- USERS LIST --------------------------//


	//---------------------- CLIENTS LIST--------------------------//
	Route::get('/clients','Backends\clients@index')->name('clients');
	Route::get('/clients/add-client','Backends\clients@new')->name('add-client');
	Route::post('/clients/insert','Backends\clients@insert')->name('insert-client');
	Route::get('/clients/edit-client/{id?}','Backends\clients@edit')->name('edit-client');
	Route::post('/clients/update-client/{id?}','Backends\clients@update')->name('update-client');
	Route::post('/clients/disable-client/{id?}','Backends\clients@disable')->name('disable_client');
	//---------------------- USERS LIST --------------------------//

	//---------------------- BOOK COUNTERS--------------------------//
	Route::get('/book-counters','Backends\clients@book_counters')->name('book_counters');
	//---------------------- BOOK COUNTERS --------------------------//


	Route::get('/home', 'HomeController@index')->name('home');

});
