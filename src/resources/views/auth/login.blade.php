@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css')}}">
@endsection

@section('content')
<div class="login__content">
    <div class="login-form__heading">
        <h2>Login</h2>
    </div>
    <form action="/login" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form-title">
                <span>メールアドレス</span>
            </div>
            <div class="form-content">
                <div class="form-content__text">
                    <input class="form-content__text-input" type="email" name="email" placeholder="例:test@example" value="{{ old('email') }}">
                </div>
            </div>
            @error('email')
            <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__group">
            <div class="form-title">
                <span>パスワード</span>
            </div>
            <div class="form-content">
                <div class="form-content__text">
                    <input class="form-content__text-input" type="password" name="password" placeholder="例:coachtech1106">
                </div>
            </div>
            @error('password')
            <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit">ログイン</button>
        </div>
    </form>
</div>
@endsection