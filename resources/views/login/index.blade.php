@extends('layouts.auth')

@section('wrapper')
    <section class="login-content">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="auth-logo">
                                <img src="{{ asset('images/dpkp.png') }}" class="img-fluid rounded-normal" alt="logo">
                            </div>
                            <h2 class="mb-2 text-center">Sign In</h2>
                            <p class="text-center">To Keep connected with us please login with your personal info.</p>
                            @if (session()->has('success'))
                                <div class="alert text-white bg-success" role="alert">
                                    <div class="iq-alert-text">{{ session('success') }}</div>
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            @endif

                            @if (session()->has('loginError'))
                                <div class="alert text-white bg-danger" role="alert">
                                    <div class="iq-alert-text">{{ session('loginError') }}</div>
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            @endif
                            <form action="/login" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email"
                                                class="form-control @error('email')
                                                is-invalid
                                            @enderror"
                                                type="email" placeholder="admin@example.com" autofocus required
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" class="form-control" type="password"
                                                placeholder="********" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="auth-recoverpw.html" class="text-primary float-right">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Create an Account <a href="/register" class="text-primary">Sign
                                            Up</a></span>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
