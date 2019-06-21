@extends('layouts.app')

@section('content')

@if (Session::has('error'))
    <script>
        jQuery(document).ready(function ($) {
            $(function(){
                swal("Error", "{{Session::get('error')}}", "error");
            });
        });
    </script>
@endif

<div class="page-login-main" style="padding-top:90px;padding-bottom:180px;">
    <h3 class="font-size-24">Log In</h3>
    <p>Login Peserta TBTN</p>

    <form method="post" action="/loginuser" autocomplete="off">
        @csrf
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} empty" name="email" required autofocus>
            <label class="floating-label" for="inputEmail">Email</label>
        </div>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} empty" name="password" required>
            <label class="floating-label" for="inputPassword">Password</label>
        </div>
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
        
        <p>No account? <a href="/register">Sign Up</a></p>

    <footer class="page-copyright">
        <p>© 2019. TBTN SMFT.</p>
        {{-- <div class="social">
        <a class="btn btn-icon btn-round social-twitter mx-5" href="javascript:void(0)">
        <i class="icon bd-twitter" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-round social-facebook mx-5" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
        </a>
            <a class="btn btn-icon btn-round social-google-plus mx-5" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
        </a>
        </div> --}}
    </footer>
</div>
@endsection
