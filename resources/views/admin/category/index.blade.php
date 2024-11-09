@extends('layouts.admin')
@section('title')
    <h3>Категории</h3>
@endsection

@section('buttons')
    <a href="/admin/categories/new" class="btn cust-btn mt-3">Создать</a>
@endsection

@section('page')
    @php
        $locale = app()->getLocale() ?? 'ru';
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th colspan="2" style="align-items: center">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        @if ($locale == 'ru')
                            {{ $item->name_ru }}
                        @else
                            {{ $item->name_en }}
                        @endif
                    </td>
                    <td>
                        <a href="/admin/categories/edit/{{ $item->id }}" class="no-margin"><i class="fa-light fa-pencil"
                                style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                        <a href="/admin/categories/delete/{{ $item->id }}" class="no-margin"><i
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
