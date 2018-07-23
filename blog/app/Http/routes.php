<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {

    $QModel = new \App\MyModels\Questions();
    $grammar = $QModel::where('type', 'Grammar')
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    $oral = $QModel::where('type', 'Oral')
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    $listening = $QModel::where('type', 'Listening')
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    $writing = $QModel::where('type', 'Writing')
            ->where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
    return view('FrenchCorner', ['grammar' => $grammar, 'oral' => $oral, 'listening' => $listening, 'writing' => $writing]);

//return view('FrenchCorner');
});


Route::get('/AABB', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('UnTranslated', ['middleware' => 'auth', function() {

        $QModel = new \App\MyModels\Questions();

        $grammar = $QModel::where('type', 'Grammar')
                ->where('status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $oral = $QModel::where('type', 'Oral')
                ->where('status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $listening = $QModel::where('type', 'Listening')
                ->where('status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $writing = $QModel::where('type', 'Writing')
                ->where('status', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        return view('UnTranslated/List', ['grammar' => $grammar, 'oral' => $oral, 'listening' => $listening, 'writing' => $writing]);
    }]);

Route::get('Translated', ['middleware' => 'auth', function() {

        $QModel = new \App\MyModels\Questions();

        $grammar = $QModel::where('type', 'Grammar')
                ->where('status', '<>', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $oral = $QModel::where('type', 'Oral')
                ->where('status', '<>', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $listening = $QModel::where('type', 'Listening')
                ->where('status', '<>', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        $writing = $QModel::where('type', 'Writing')
                ->where('status', '<>', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        return view('Translated/List', ['grammar' => $grammar, 'oral' => $oral, 'listening' => $listening, 'writing' => $writing]);
    }]);

Route::get('Answer', ['middleware' => 'auth', function() {

        if (!\Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        $QModel = new \App\MyModels\Questions();

        $grammar = $QModel::where('type', 'Grammar')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();
        $oral = $QModel::where('type', 'Oral')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();
        $listening = $QModel::where('type', 'Listening')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();
        $writing = $QModel::where('type', 'Writing')
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();
        return view('Answer/List', ['grammar' => $grammar, 'oral' => $oral, 'listening' => $listening, 'writing' => $writing]);
    }]);

Route::get('Answered', ['middleware' => 'auth', function() {

        $QModel = new \App\MyModels\Questions();

        $grammar = $QModel::where('type', 'Grammar')
                ->where('status', 2)
                ->orderBy('created_at', 'desc')
                ->get();
        $oral = $QModel::where('type', 'Oral')
                ->where('status', 2)
                ->orderBy('created_at', 'desc')
                ->get();
        $listening = $QModel::where('type', 'Listening')
                ->where('status', 2)
                ->orderBy('created_at', 'desc')
                ->get();
        $writing = $QModel::where('type', 'Writing')
                ->where('status', 2)
                ->orderBy('created_at', 'desc')
                ->get();
        return view('Answered/List', ['grammar' => $grammar, 'oral' => $oral, 'listening' => $listening, 'writing' => $writing]);
    }]);
Route::post('RESTFullQuestionsAPI/answer', 'RESTFullQuestionsController@answerQuestion');
Route::post('RESTFullQuestionsAPI/ask', 'RESTFullQuestionsController@storeQuestion');
Route::resource('RESTFullQuestionsAPI', 'RESTFullQuestionsController');


//set the language enviroment
Route::get('/lang/{locale}', function ($locale) {
    if (!\Session::has('locale')) {
        \Session::put('locale', $locale);
    } else {
        Session::set('locale', $locale);
    }
    return redirect()->back();
});
