@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-left">
                <div class="card-header h3">Your Tasks</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr class="font-weight-bold h5 text-left">
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr scope="row">
                                    <td>{{ $task->name }}</td>
                                <td>
                                    <a href="/task/{{ $task->id }}/complete" class="btn btn-{{ $task->completed ? 'success' : 'danger' }}"></a>
                                </td>
                                    <td class="ml-auto"><a href="/task/{{ $task->id }}" class="btn btn-info text-white">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/newtask" class="btn btn-success text-white d-flex float-left">New Task</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
