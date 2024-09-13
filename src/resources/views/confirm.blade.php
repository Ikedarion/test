@extends('layouts.form')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>

    <form class="form" action="{{ route('form.complete') }}" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-name" type="hidden" name="last_name" value="{{ $input['last_name'] }}" readonly />
                        <input class="confirm-table__text-name" type="hidden" name="first_name" value="{{ $input['first_name'] }}" readonly />
                        <p class="confirm-table__text-p">{{ $input['last_name'] }} {{ $input['first_name'] }}</p>
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @if($input['gender'] == 1)
                        <p class="confirm-table__text-p">男性</p>
                        @elseif($input['gender'] == 2)
                        <p class="confirm-table__text-p">女性</p>
                        @else
                        <p class="confirm-table__text-p">その他</p>
                        @endif
                        <input type="hidden" name="gender" value="{{ $input['gender'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-input" type="email" name="email" value="{{ $input['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-input" type="text" name="tel" value="{{ $input['tel'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-input" type="text" name="address" value="{{ $input['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-input" type="text" name="building" value="{{ $input['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        @if($input['category_id'] == 1)
                        <p class="confirm-table__text-p">商品のお届けについて</p>
                        @elseif($input['category_id'] == 2)
                        <p class="confirm-table__text-p">商品の交換について</p>
                        @elseif($input['category_id'] == 3)
                        <p class="confirm-table__text-p">商品トラブル</p>
                        @elseif($input['category_id'] == 4)
                        <p class="confirm-table__text-p">ショップへのお問い合わせ</p>
                        @else
                        <p class="confirm-table__text-p">その他</p>
                        @endif
                        <input class="confirm-table__text-input" type="hidden" name="category_id" value="{{ $input['category_id'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問合せ内容</th>
                    <td class="confirm-table__text">
                        <input class="confirm-table__text-input" type="text" name="detail" value="{{ $input['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__footer">
            <div class="form__button">
                <input class="form__button-submit" name="submit" type="submit" value="送信" />
            </div>
            <div>
                <input class="form__button-back" name="back" type="submit" value="修正" />
            </div>
        </div>
    </form>
</div>
@endsection