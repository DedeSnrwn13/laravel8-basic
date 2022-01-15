<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $tasklist = [
        'first' => 'Sleep',
        'second' => 'Eat',
        'third' => 'Work'
    ];

    public function index(Request $request)
    {
        if ($request->search) {
            return $this->tasklist[$request->search];
        }

        return $this->tasklist;
    }

    public function store(Request $request)
    {
        DB::table('tasks')->insert([
            'task' => $request->task,
            'user' => $request->user,
        ]);

        return 'success';
    }

    public function show($param)
    {
        return $this->tasklist[$param];
    }

    public function update(Request $request, $key)
    {
        $this->tasklist[$key] = $request->task;

        return $this->tasklist;
    }

    public function destroy($key)
    {
        unset($this->tasklist[$key]);

        return $this->tasklist;
    }
}
