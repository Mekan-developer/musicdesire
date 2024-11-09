@extends('layouts.admin')
@section('title')
    <h3>Выступления</h3>
@endsection

@section('buttons')
    <a href="/admin/performance/new" class="btn cust-btn mt-3">Создать</a>
@endsection

@section('page')
    @php
        $locale = app()->getLocale() ?? 'ru';
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Заголовок (рус.)</th>
                <th scope="col">Заголовок (анг.)</th>
                <th colspan="2" style="align-items: center">Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($all as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>
                        {{ $item->title_ru }}
                    </td>
                    <td>
                        {{ $item->title_en }}
                    </td>
                    <td>
                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                            data-bs-target="#applyModal{{ $item->id }}">
                            <i class="fa-light fa-eye" style="font-size:18px;margin-right:10px; color:#ff7472"></i>
                        </button>
                        <a href="/admin/performance/edit/{{ $item->id }}" class="no-margin"><i class="fa-light fa-pencil"
                            style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                        <a href="/admin/performance/delete/{{ $item->id }}" class="no-margin"><i
                                class="fa-light fa-trash-can" style="font-size:18px;color:#ff7472"></i></a>
                    </td>
                </tr>

            @empty
                <p>Выступления отсутствуют</p>
            @endforelse
        </tbody>
    </table>
    @foreach ($all as $item)
        <div class="modal fade" id="applyModal{{ $item->id }}" tabindex="-1"
            aria-labelledby="applyModal{{ $item->id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applyModal{{ $item->id }}Label">Просмотр выступления</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <video controls width="100%">
                            <source src="{{ asset('storage/perform/' . $item->video) }}" type="video/mp4">
                            Ваш браузер не поддерживает видео тег.
                        </video>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Скрыть</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
