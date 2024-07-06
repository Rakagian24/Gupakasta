@extends('layouts.auth')

@section('wrapper')
    <section class="login-content">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-5">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="auth-logo">
                                <img src="{{ asset('images/dpkp.png') }}" class="img-fluid rounded-normal" alt="logo">
                            </div>
                            <h3 class="mb-3 font-weight-bold text-center">Getting Started</h3>
                            <form action="/register" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-secondary">Name</label>
                                            <input name="name"
                                                class="form-control @error('name')
                                                is-invalid
                                            @enderror"
                                                type="text" placeholder="Enter Name" required
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-secondary">Username</label>
                                            <input name="username"
                                                class="form-control @error('username')
                                                is-invalid
                                            @enderror"
                                                type="text" placeholder="Enter Username" required
                                                value="{{ old('username') }}">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-secondary">Email</label>
                                            <input name="email"
                                                class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                type="email" placeholder="Enter Email" required
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-2">
                                        <div class="form-group">
                                            <label class="text-secondary">Password</label>
                                            <input name="password"
                                                class="form-control @error('password')
                                                is-invalid
                                            @enderror"
                                                type="password" placeholder="Enter Password" required
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mt-2">Create Account</button>
                                <div class="col-lg-12 mt-3">
                                    <p class="mb-0 text-center">Do you have an account? <a href="/login">Sign In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
