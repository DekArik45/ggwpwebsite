@extends('layouts.app')

@section('content')
<div class="page-login-main" style="padding-top:90px;padding-bottom:180px;">
    <h3 class="font-size-24">Sign Up</h3>
    <p>Sign Up Peserta</p>

    <form method="post" action="{{ route('register') }}" autocomplete="off">
        @csrf
        <div class="form-group form-material floating" data-plugin="formMaterial">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} empty" name="name" value="" required>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        <label class="floating-label" for="inputEmail">Name</label>
        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} empty" name="email" value="" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            <label class="floating-label" for="inputEmail">Email</label>
        </div>
        <div class="form-group form-material floating" data-plugin="formMaterial">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} empty" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            <label class="floating-label" for="inputPassword">Password</label>
        </div>

        <div class="form-group form-material floating" data-plugin="formMaterial">
                
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                
            <label class="floating-label" for="inputPassword">Confirm Password</label>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
    </form>
        
        <p>Already Have an account? <a href="/viewlogin">Sign In</a></p>

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

