<!-- resources/views/categories/index.blade.php -->

@extends('layouts.master')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <br>
        <a href="{{ route('categories.create') }}" class="btn btn-dark mb-3">Add Category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
