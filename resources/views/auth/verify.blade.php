@extends('layouts.app')

@section('content')

@if (Session::has('resendverify'))
<script>
    jQuery(document).ready(function ($) {
        $(function(){
            swal("Success", "{{Session::get('resendverify')}}", "success");
        });
    });
</script>
@endif
{{$user}}

    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }}, <a href="/resendverify/">{{ __('click here to request another') }}</a>.

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
@endsection
