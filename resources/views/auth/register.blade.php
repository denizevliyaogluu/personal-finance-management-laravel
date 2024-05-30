<!-- resources/views/auth/register.blade.php -->
@extends('layouts.master')

@section('content')
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100%;
            background-repeat: no-repeat;
        }

        .card0 {
            box-shadow: 0px 4px 8px 0px #757575;
            border-radius: 0px;
        }

        .card2 {
            margin: 0px 40px;
        }

        .logo {
            width: 200px;
            height: 100px;
            margin-top: 20px;
            margin-left: 35px;
        }

        .image {
            width: 360px;
            height: 280px;
        }

        .border-line {
            border-right: 1px solid #EEEEEE;
        }

        .facebook {
            background-color: #3b5998;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .twitter {
            background-color: #1DA1F2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .linkedin {
            background-color: #2867B2;
            color: #fff;
            font-size: 18px;
            padding-top: 5px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
        }

        .line {
            height: 1px;
            width: 45%;
            background-color: #E0E0E0;
            margin-top: 10px;
        }

        .or {
            width: 10%;
            font-weight: bold;
        }

        .text-sm {
            font-size: 14px !important;
        }

        ::placeholder {
            color: #BDBDBD;
            opacity: 1;
            font-weight: 300
        }

        :-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        ::-ms-input-placeholder {
            color: #BDBDBD;
            font-weight: 300
        }

        input,
        textarea {
            padding: 10px 12px 10px 12px;
            border: 1px solid lightgrey;
            border-radius: 2px;
            margin-bottom: 5px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 14px;
            letter-spacing: 1px;
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #304FFE;
            outline-width: 0;
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }

        a {
            color: inherit;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #1A237E;
            width: 150px;
            color: #fff;
            border-radius: 2px;
        }

        .btn-blue:hover {
            background-color: #000;
            cursor: pointer;
        }

        .bg-blue {
            color: #fff;
            background-color: #1A237E;
        }

        @media screen and (max-width: 991px) {
            .logo {
                margin-left: 0px;
            }

            .image {
                width: 300px;
                height: 220px;
            }

            .border-line {
                border-right: none;
            }

            .card2 {
                border-top: 1px solid #EEEEEE !important;
                margin: 0px 15px;
            }

            .enlarged-center-container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
            }

            .enlarged-center {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0">
            <div class="row d-flex">
                {{-- <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row">
                        <img src="https://i.imgur.com/CXQmsmF.png" class="logo">
                    </div>
                        <div class="row px-3 mt-4 mb-5 border-line enlarged-center-container">
                            <img src="{{ asset('upload/pets/login.jpg') }}" class="image enlarged-center">
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="card2 card border-0 px-4 py-5 d-flex align-items-center justify-content-center">
                        <!-- Register Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Name</h6>
                                </label>
                                <input id="name" type="text"
                                    class="mb-4 form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Enter your name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Surname</h6>
                                </label>
                                <input id="surname" type="text"
                                    class="mb-4 form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname"
                                    placeholder="Enter your surname">
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email Address</h6>
                                </label>
                                <input id="email" type="email"
                                    class="mb-4 form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Enter a valid email address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Address</h6>
                                </label>
                                <input id="address" type="text"
                                    class="mb-4 form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address"
                                    placeholder="Enter a valid address address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Phone</h6>
                                </label>
                                <input id="phone" type="text"
                                    class="mb-4 form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="phone"
                                    placeholder="Enter a valid phone address">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Password</h6>
                                </label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Enter password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row px-3">
                                <label class="mb-1">
                                    <h6 class="mb-0 text-sm">Confirm Password</h6>
                                </label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm your password">
                            </div>
                            <div class="row mb-3 px-3 d-flex align-items-center justify-content-center mt-2">
                                <button type="submit" class="btn btn-dark text-center">Register</button>
                            </div>
                        </form>
                        <!-- Login Link -->
                        {{-- <div class="row mb-4 px-3">
                        <small class="font-weight-bold">Already have an account? <a class="text-danger" href="{{ route('login') }}">Login</a></small>
                    </div> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="bg-blue py-4">
            <div class="row px-3">
                <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto">
                    <span class="fa fa-facebook mr-4 text-sm"></span>
                    <span class="fa fa-google-plus mr-4 text-sm"></span>
                    <span class="fa fa-linkedin mr-4 text-sm"></span>
                    <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
                </div>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
