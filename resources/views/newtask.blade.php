@extends('layouts/app')

@section('title')
    Create New Task
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($errors->any())
                    @foreach ($errors->all() as $e)
                        <div class="alert alert-danger" role="alert">
                            {{ $e }}
                        </div>
                    @endforeach
                @endif
                <div class="card-header h3">New Task</div>
                <div class="card-body">
                    <form method="POST" action="/createtask">
                        @csrf
                        <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="description" class="col-sm-2 col-form-label">Description</label>
                          <div class="col-sm-10">
                            <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection