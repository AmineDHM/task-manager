@extends('layouts/app')

@section('title')
    {{ $task->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3">View Task</div>
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $task->name }}
                        </h3>
                        <p class="card-text h5">
                            {{ $task->description }}
                        </p>
                        <a href="/task/{{ $task->id }}/edit" class="btn btn-info text-white my-2 mx-1">Edit</a>
                        <a href="/task/{{ $task->id}}/delete" class="btn btn-danger text-white my-2">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection