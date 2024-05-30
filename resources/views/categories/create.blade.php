<!-- resources/views/categories/create.blade.php -->

@extends('layouts.master')

@section('title', 'Add Category')

@section('content')
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-light border-bottom-0">
                    <h5 class="mb-0 text-center">Add Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                        <label for="category_name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
