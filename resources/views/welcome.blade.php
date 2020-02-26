@extends('layouts.app')

@section('title')
    Welcome to Task Manager Application
@endsection

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="card-title">Task Manager Application</h3>
                <h5 class="card-subtitle mb-2 text-muted">Welcom</h5>
                <p class="card-text">Login or Register to manage your tasks</p>
                <a href="/login" class="btn btn-info text-white">Login</a>
                <a href="/register" class="btn btn-info text-white">Register</a>
            </div>
        </div>
    </div>
@endsection