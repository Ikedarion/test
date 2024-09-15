@extends('layouts.form')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="first_and_last_name">
                    <div class="form__item--name">
                        <input class="form__item--text-input" type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
                    </div>
                    <div class="form__item--text">
                        <input class="form__item--text-input" type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('first_name')
            {{ $message }}
            @enderror
        </div>
        <div class="form__error">
            @error('last_name')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--text">
                    <label class="form__item--label">
                        <input class="form__item--label-input" type="radio" name="gender" value="1" checked>男性
                    </label>
                    <label class="form__item--label">
                        <input class="form__item--label-input" type="radio" name="gender" value="2">女性
                    </label>
                    <label class="form__item--label">
                        <input class="form__item--label-input" type="radio" name="gender" value="3">その他
                    </label>
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('gender')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--text">
                    <input class="form__item--text-input" type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}" />
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--tel">
                    <input class="form__item--tel-input" type="text" name="tel" placeholder="09012345678" value="{{ old('tel') }}" />
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('tel')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--text">
                    <input class="form__item--text-input" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷" value="{{ old('address') }}" />
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('address')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--text">
                    <input class="form__item--text-input" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('building')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--select">
                    <select class="form__item--select-option" name="category_id">
                        @foreach($categories as $category)
                        <option value="" selected hidden>選択してください</option>
                        <option value="{{ $category['id'] }}" @if(old('category_id')==$category->id) selected @endif>>
                            {{ $category['content'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('category_id')
            {{ $message }}
            @enderror
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__item--textarea">
                    <textarea class="form__item--textarea-input" name="detail" rows="6" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
            </div>
        </div>
        <div class="form__error">
            @error('detail')
            {{ $message }}
            @enderror
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>

</div>

@endsection