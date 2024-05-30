<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.master')

@section('title', 'Edit Category')

@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-lg">
            <div class="card-header bg-light border-bottom-0">
                <h5 class="mb-0 text-center">Edit Category</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $category->name }}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

@endsection
