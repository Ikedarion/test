@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register__content">
    <div class="register-form__heading">
        <h2>Register</h2>
    </div>
    <form action="/register" method="post" class="form">
        @csrf
        <div class="form__group">
            <div class="form-title">
                <span>お名前</span>
            </div>
            <div class="form__content">
                <div class="form__content--text">
                    <input class="form__content--text-input" type="text" name="name" value="{{ old('name') }}" placeholder="例:山田 太郎" />
                </div>
            </div>
            @error('name')
            <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__group">
            <div class="form-title">
                <span>メールアドレス</span>
            </div>
            <div class="form-content">
                <div class="form__content--text">
                    <input class="form__content--text-input" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
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
                <div class="form__content--text">
                    <input class="form__content--text-input" type="password" name="password" placeholder="例:coachtech1106" value="{{ old('password') }}" />
                </div>
            </div>
            @error('password')
            <div class="form__error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit">登録</button>
        </div>
    </form>
</div>
@endsection