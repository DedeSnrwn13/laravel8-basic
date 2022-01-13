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

Route::get('/', function () {
    return view('welcome');
});

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
