@extends('layouts.app')

@section('main')
    <div class="mt-5 mx-auto" style="width: 380px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ url("tasks/$task->id") }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="" class="form-label">User</label>
                        <input name="user" type="text" class="form-control" value="{{ $task->user }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Task</label>
                        <textarea name="task" class="form-control" id="" rows="3">{{ $task->task }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
