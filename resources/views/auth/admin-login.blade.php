@extends('layouts.app')

@section('content')
<div class="page-login-main" style="padding-top:90px;padding-bottom:180px;">
    <h3 class="font-size-24">Log In</h3>
    <p>Login Admin TBTN, untuk mengatur content yang ada di web</p>

    <form method="post" action="{{ route('admin.login.submit') }}" autocomplete="off">
        @csrf
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="text" class="form-control empty" id="inputEmail" name="username">
            <label class="floating-label" for="inputEmail">Username</label>
        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty" id="inputPassword" name="password">
            <label class="floating-label" for="inputPassword">Password</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    </form>
        
        <p>No account? <a href="register-v2.html">Sign Up</a></p>

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
