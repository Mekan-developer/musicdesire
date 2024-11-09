@extends('layouts.admin')
@section('title')
    <h3>База пользователей</h3>
@endsection

@section('page')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th colspan="2" style="align-items: center">Статус</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        {{ $item->name }}
                    </td>
                    <td>
                        {{ $item->email }}
                    </td>
                    <td>
                        <div style="width: 50px; display: inline;">
                            <a href="/admin/users/{{ $item->id }}/switch-status" class="no-margin"><i
                                    class="fa-light 
                                @if ($item->status == 1) fa-lock-open    
                                @else
                                fa-lock @endif
                                "
                                    style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                        </div>
                        <div style="width: 50px; display: inline;">
                            @if ($item->admin == 1)
                                <a href="/admin/users/{{ $item->id }}/switch-access" class="no-margin"><i
                                        class="fa-light fa-shield"
                                        style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                            @else
                                <a href="/admin/users/{{ $item->id }}/switch-access" class="no-margin"><i
                                        class="fa-light fa-user"
                                        style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                            @endif
                        </div>

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
