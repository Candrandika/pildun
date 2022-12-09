@extends('layout.layout')

@section('title', 'Login')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="text-center h2 fw-bold my-4">
        Login
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 d-flex justify-content-center align-items-center">
                <form action="/login" method="POST" class="col-12 card px-3 py-5 border-danger">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control border-danger" placeholder="your email" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control border-danger" placeholder="password" required>
                    </div>
                    <button class="btn btn-danger">Login</button>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection