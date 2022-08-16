@extends('layouts.clients.master')
@section('style-custom')
    <link rel="stylesheet" href="{{asset('styles/login.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">

                <div class="card-body">
                    <div class="card-header">
                        <h3>Sign In</h3>
                    </div>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <a class="btn" href="{{route('login.google')}}" style="background: #FFC210; color: #fff; text-transform: uppercase">
                            <i class="fab fa-google-plus-square" aria-hidden="true"></i>
                            Đăng nhập với tài khoản google
                        </a>
                        @if (session('msg'))
                            <p class="text-danger msg-err">
                                {{ session('msg') }}
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
