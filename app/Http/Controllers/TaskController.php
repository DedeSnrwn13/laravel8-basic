<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $tasklist = [
        'first' => 'Sleep',
        'second' => 'Eat',
        'third' => 'Work'
    ];

    public function index()
    {
        if (request()->search) {
            return $this->tasklist[request()->search];
        }

        return $this->tasklist;
    }

    public function store()
    {
        $this->tasklist[request()->label] = request()->task;

        return $this->tasklist;
    }

    public function show($param)
    {
        return $this->tasklist[$param];
    }

    public function update($key)
    {
        $this->tasklist[$key] = request()->task;

        return $this->tasklist;
    }

    public function destroy($key)
    {
        unset($this->tasklist[$key]);

        return $this->tasklist;
    }
}
