@extends('templates.templatelogin')
@section('app-title', 'Login')
@section('cardtitle', 'Login Aplikasi SPP')
@section('loginform')
<form method="POST">
    <fieldset class="uk-fieldset">

        <div class="uk-margin">
            <div class="uk-position-relative">
                <span class="uk-form-icon ion-android-person"></span>
                <input name="email" class="uk-input" type="text" placeholder="Username">
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
