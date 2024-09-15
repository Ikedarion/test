@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection


@section('content')
<div class="admin__content">
    <div class="admin__content--heading">
        <h2>Admin</h2>
    </div>
    <form class="search-form" action="/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールを入力してください" value="{{ old('keyword') }}" />

            <select class="search-form__item-gender" name="gender">
                <option value="" selected hidden>性別</option>
                <option value="">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>

            <select class="search-form__item-detail" name="category_id">
                @foreach ($categories as $category)
                <option value="" selected hidden>お問い合わせの種類</option>
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="search-form__item-date" type="date" name="date">
        </div>
        <div class="search-form__btn">
            <input class="search-form__btn-submit" type="submit" value="検索"></input>
            <a class="search-form__btn-reset" href="{{route('admin')}}">リセット</a>
        </div>
    </form>
    <form class="admin__item" action="" method="post">
        <div class="export__button">
            <input class="export__button-submit" type="submit">
        </div>
        <div class="pagination">
        </div>
    </form>
    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class=" admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class=" admin-table__header">お問い合わせの種類</th>
                <th class=" admin-table__header"></th>
            </tr>
            @foreach ($items as $item)
            <tr class="admin-table__row">
                <td class="admin-table__item">{{$item->last_name}}&nbsp;&nbsp; {{$item->first_name}}</td>
                <td class="admin-table__item">{{$item->gender}}</td>
                <td class="admin-table__item">{{$item->email}}</td>
                <td class="admin-table__item">{{$item['category']['content']}}</td>
                <td class="admin-table__item">
                    <div class="modal__button">
                        <a href="#modal" class="modal-open-button">詳細</a>
                    </div>
                    <div class="modal" id="modal">
                        <div class="modal-wrapper">
                            <a href="#" class="close">&times;</a>
                            <div class="modal-content">
                                <form class="form" action="" method="">
                                    @csrf
                                   
                                    <div class="modal-table">
                                        <table class="modal-table__inner">
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">お名前</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-name" type="hidden" name="last_name" value="{{$item->last_name}}" readonly />
                                                    <input class="modal-table__text-name" type="hidden" name="first_name" value="{{$item->first_name}}" readonly />
                                                    <p class="modal-table__text-p">{{$item->last_name}}&nbsp;&nbsp;{{$item->first_name}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">性別</th>
                                                <td class="modal-table__text">
                                                    <input type="hidden" name="gender" value="{{$item->gender}}" />
                                                    <p class="modal-table__text-p">{{$item->gender}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">メールアドレス</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="email" value="{{$item->email}}" readonly />
                                                    <p class="modal-table__text-p">{{$item->email}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">電話番号</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="tel" value="{$item->tel}}" />
                                                    <p class="modal-table__text-p">{{$item->tel}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">住所</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="address" value="{$item->address}}" readonly />
                                                    <p class="modal-table__text-p">{{$item->address}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">建物名</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="building" value="" readonly />
                                                    <p class="modal-table__text-p">{{$item->building}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">お問い合わせの種類</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="category_id" value="{{$item->category_id}}" />
                                                    <p class="modal-table__text-p">{{$item['category']['content']}}</p>
                                                </td>
                                            </tr>
                                            <tr class="modal-table__row">
                                                <th class="modal-table__header">お問合せ内容</th>
                                                <td class="modal-table__text">
                                                    <input class="modal-table__text-input" type="hidden" name="detail" value="{$item->detail}}" readonly />
                                                    <p class="modal-table__text-p">{{ $item['detail'] }}</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form__footer">
                                        <div class="modal__button">
                                            <input class="modal__button-submit" name="submit" type="submit" value="削除" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection