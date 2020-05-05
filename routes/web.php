<?php

use Illuminate\Support\Facades\Route;


//website route
Route::get('/', 'Site\SiteController@index')->name('index');

Auth::routes();


//Admin route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('home');


//Profile Route
    Route::prefix('profiles')->name('profiles.')->group(function () {
        Route::get('/profile', 'Admin\ProfileController@profile')->name('profile');
        Route::get('/edit', 'Admin\ProfileController@edit')->name('edit');
        Route::post('/update', 'Admin\ProfileController@update')->name('update');



    });


    //Homepage Route
    Route::prefix('homepage')->name('homepage.')->group(function () {
        Route::get('/', 'Admin\HomepageController@index')->name('manage');
        Route::get('/add', 'Admin\HomepageController@create')->name('create');
        Route::post('/store', 'Admin\HomepageController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\HomepageController@edit')->name('edit');
        Route::put('/update/{id}', 'Admin\HomepageController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\HomepageController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\HomepageController@updateStatus')->name('update.status');
    });

    //Hobby Route
    Route::prefix('hobbies')->name('hobbies.')->group(function () {
        Route::get('/', 'Admin\HobbyController@index')->name('manage');
        Route::get('/add', 'Admin\HobbyController@create')->name('create');
        Route::post('/store', 'Admin\HobbyController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\HobbyController@edit')->name('edit');
        Route::put('/update', 'Admin\HobbyController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\HobbyController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\HobbyController@updateStatus')->name('update.status');
    });

    //Interest Route
    Route::prefix('interests')->name('interests.')->group(function () {
        Route::get('/', 'Admin\InterestController@index')->name('manage');
        Route::get('/add', 'Admin\InterestController@create')->name('create');
        Route::post('/store', 'Admin\InterestController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\InterestController@edit')->name('edit');
        Route::put('/update', 'Admin\InterestController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\InterestController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\InterestController@updateStatus')->name('update.status');
    });


    //Service Route
    Route::prefix('services')->name('services.')->group(function () {
        Route::get('/', 'Admin\ServiceController@index')->name('manage');
        Route::get('/add', 'Admin\ServiceController@create')->name('create');
        Route::post('/store', 'Admin\ServiceController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ServiceController@edit')->name('edit');
        Route::put('/update', 'Admin\ServiceController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ServiceController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\ServiceController@updateStatus')->name('update.status');
    });


    //Work & Participations Route
    Route::prefix('participations')->name('participations.')->group(function () {
        Route::get('/', 'Admin\ParticipationController@index')->name('manage');
        Route::get('/add', 'Admin\ParticipationController@create')->name('create');
        Route::post('/store', 'Admin\ParticipationController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ParticipationController@edit')->name('edit');
        Route::put('/update', 'Admin\ParticipationController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ParticipationController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\ParticipationController@updateStatus')->name('update.status');
    });


    //Work Expertise Route
    Route::prefix('expertises')->name('expertises.')->group(function () {
        Route::get('/', 'Admin\ExpertiseController@index')->name('manage');
        Route::get('/add', 'Admin\ExpertiseController@create')->name('create');
        Route::post('/store', 'Admin\ExpertiseController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\ExpertiseController@edit')->name('edit');
        Route::put('/update', 'Admin\ExpertiseController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\ExpertiseController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\ExpertiseController@updateStatus')->name('update.status');
    });


    //My Portfolio Route
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('manage');
        Route::get('/add', 'Admin\CategoryController@create')->name('create');
        Route::post('/store', 'Admin\CategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\CategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\CategoryController@updateStatus')->name('update.status');
    });

    Route::prefix('subcategories')->name('subcategories.')->group(function () {
        Route::get('/', 'Admin\SubCategoryController@index')->name('manage');
        Route::get('/add', 'Admin\SubCategoryController@create')->name('create');
        Route::post('/store', 'Admin\SubCategoryController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SubCategoryController@edit')->name('edit');
        Route::put('/update', 'Admin\SubCategoryController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SubCategoryController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SubCategoryController@updateStatus')->name('update.status');
    });



    /**
     * SLIDERS Route
     */
    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', 'Admin\SliderController@index')->name('manage');
        Route::get('/add', 'Admin\SliderController@create')->name('create');
        Route::post('/store', 'Admin\SliderController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\SliderController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\SliderController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\SliderController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\SliderController@updateStatus')->name('update.status');
    });


    /**
     * News & Blog Route
     */
    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', 'Admin\BlogController@index')->name('manage');
        Route::get('/add', 'Admin\BlogController@create')->name('create');
        Route::post('/store', 'Admin\BlogController@store')->name('store');
        Route::get('/edit/{id}', 'Admin\BlogController@edit')->name('edit');
        Route::post('/update/{id}', 'Admin\BlogController@update')->name('update');
        Route::get('/delete/{id}', 'Admin\BlogController@delete')->name('delete');
        Route::get('/update-status/{id}/{status}', 'Admin\BlogController@updateStatus')->name('update.status');
    });
});

