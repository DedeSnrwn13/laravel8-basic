<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/hello', function () {
    $dataArray = [
        'message' => 'Hello, world'
    ];

    // return $dataArray;
    return response()->json($dataArray);
});

Route::get('/debug', function () {
    $dataArray = [
        'message' => 'Hello, world'
    ];

    dd($dataArray);
});

$tasklist = [
    'first' => 'Sleep',
    'second' => 'Eat',
    'third' => 'Work'
];

Route::get('/tasks', function () use ($tasklist) {
    // ddd(request()->all());
    if (request()->search) {
        return $tasklist[request()->search];
    }

    return $tasklist;
});

Route::get('/tasks/{param}', function ($param) use ($tasklist) {
    return $tasklist[$param];
});

Route::get('/tasks', function () use ($tasklist) {
    // return request()->all();
    $tasklist[request()->label] = request()->task;

    return $tasklist;
});

Route::patch('/tasks/{key}', function ($key) use ($tasklist) {
    $tasklist[$key] = request()->task;
    return $tasklist;
});

Route::delete('/tasks/{key}', function ($key) use ($tasklist) {
    unset($tasklist[$key]);

    return $tasklist;
});
