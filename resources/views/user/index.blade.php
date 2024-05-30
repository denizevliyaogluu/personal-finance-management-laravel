@extends('layouts.master')

@section('title', 'My Profile')

@section('content')
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-light border-bottom-0">
                    <h5 class="mb-0 text-center">User Profile</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="surname">Surname:</label>
                            <input type="text" name="surname" id="surname" class="form-control"
                                value="{{ $user->surname }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ $user->address }}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <br>
@endsection
