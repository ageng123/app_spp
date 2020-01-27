@extends('templates.templatelogin')
@section('app-title', 'Login')
@section('cardtitle', 'Login Aplikasi SPP')
@section('loginform')
@if(session('message'))
<script>UIkit.notification({message: '{{session("message")}}', pos: 'top-right',  status: 'danger'});</script>
@endif
<form method="POST" action="{{route('auth.check', ['check' => mt_rand(1, 1000)])}}">
    @csrf
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <div class="uk-position-relative">
                <span class="uk-form-icon ion-android-person"></span>
                <input name="username" class="uk-input" type="text" placeholder="Username">
            </div>
        </div>

        <div class="uk-margin">
            <div class="uk-position-relative">
                <span class="uk-form-icon ion-locked"></span>
                <input name="password" class="uk-input" type="password" placeholder="Password">
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-position-relative">
                <span class="uk-form-icon ion-locked"></span>
                <input name="password" class="uk-checkbox" id="remember" type="checkbox" label="Password">
                <label for="remember">Remember Me</label>
            </div>
        </div>
        <hr />
        <center>
            <div class="uk-margin">
                <button type="submit" class="uk-button uk-button-primary">
                <span uk-icon="icon: sign-in"></span>
                        &nbsp; Login
                </button>
            </div>
        </center>
    </fieldset>
</form>
@endsection
