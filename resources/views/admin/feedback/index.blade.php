@extends('layouts.admin')
@section('title')
    <h3>Отзывы</h3>
@endsection

@section('buttons')
    <a href="/admin/feedback/new" class="btn cust-btn mt-3">Создать</a>
@endsection

@section('page')
    @php
        $locale = app()->getLocale() ?? 'ru';
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Фото</th>
                <th scope="col">Имя</th>
                <th scope="col">Ссылка на профиль</th>
                <th colspan="2" style="align-items: center">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        <img src="{{ asset('storage/feedback/' . $item->image) }}" alt="" width="50px"
                            height="50px" style="border-radius: 50%">
                    </td>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                       <a href="{{$item->link}}">{{ $item->link }}</a>
                    </td>
                    <td>
                        <a href="/admin/feedback/edit/{{ $item->id }}" class="no-margin"><i class="fa-light fa-pencil"
                                style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                        <a href="/admin/feedback/delete/{{ $item->id }}" class="no-margin"><i
                                class="fa-light fa-trash-can" style="font-size:18px;color:#ff7472"></i></a>
                    </td>
                </tr>

            @empty
                <p>Категории отсутствуют</p>
            @endforelse
        </tbody>
    </table>
    {{-- <div class="item-list">
        @php
            $locale = app()->getLocale() ?? 'ru';
        @endphp
        @foreach ($all as $item)
            <div class="item">
                @if ($locale == 'ru')
                    {{ $item->name_ru }}
                @else
                    {{ $item->name_en }}
                @endif
                <div>
                    <a href="/admin/categories/edit/{{ $item->id }}">Изменить</a>
                    <a href="/admin/categories/delete/{{ $item->id }}">Удалить</a>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
