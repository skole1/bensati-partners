@extends('layouts.master')


@section('title')
    Register | Bensati-Partners
@endsection

@section('content')
    <section class="row mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card-body bg-white">
                <h1 class="font-weight-bold mb-2 mt-3 mb-2">Register</h1>
                <p class="font-weight-bold small mb-2">Bensati-Partners</p>
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Full name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter Password">
                        @error('password')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" placeholder="password_confirmation">
                        @error('password_confirmation')
                            <div class="text-danger mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <input type="submit" value="Register" class="btn-red btn-block">
                        </div>
                        <p class="col-md-12 mt-2">

                            Already have Account? <a href="#" class="text-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </section>
@endsection
