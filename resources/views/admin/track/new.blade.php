@extends('layouts.admin')
@section('title')
    <h3>
        Добавить трек</h3>
@endsection

@section('buttons')
    <i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
    <a href="/admin/tracks" class=" mt-3" style="font-size:18px">Вернуться к списку треков</a>

@endsection

@section('page')
    @php
        $locale = app()->getLocale() ?? 'ru';
    @endphp
    <form action="/admin/tracks/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="file"  class="modal-p">Выберите аудио файл для предпросмотра</label>
                        <input type="file" class="form-control  modal-input" id="file" accept="audio/*" name="file">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="file_full" class="modal-p">Выберите полный аудио файл</label>
                        <input type="file" class="form-control modal-input" id="file_full" accept="audio/*" name="file_full">
                    </div>

                </div>
            </div>
            <div class="form-group mt-3">
                <label for="track_name_ru" class="modal-p">Название на русском</label>
                <input type="text" class="form-control modal-input" id="track_name_ru" name="track_name_ru"
                    placeholder="Введите текст" value="Трек №{{ $newId }}">
            </div>
            <div class="form-group mt-3">
                <label for="track_name_en" class="modal-p">Название на английском</label>
                <input type="text" class="form-control modal-input" id="track_name_en" name="track_name_en"
                    placeholder="Введите текст" value="Track №{{ $newId }}">
            </div>
            <div class="form-group mt-3">
                <label for="track_category" class="modal-p">Категория трека</label>
                <select class="form-control" id="track_category" name="track_category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            @if ($locale == 'ru')
                                {{ $category->name_ru }}
                            @else
                                {{ $category->name_en }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="track_lang" class="modal-p">Язык трека</label>
                <select class="form-control" id="track_lang" name="track_lang">
                    @foreach ($langs as $lang)
                        <option value="{{ $lang->id }}">
                            @if ($locale == 'ru')
                                {{ $lang->name_ru }}
                            @else
                                {{ $lang->name_en }}
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="track_tempo" class="modal-p">Темп</label>
                <select class="form-control" id="track_tempo" name="track_tempo">
                    @foreach ($tempos as $tempo)
                        <option value="{{ $tempo->id }}">
                                {{ __('common.' . $tempo->name) }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="container mt-3">
                <div class="form-group">
                    <label>В композиции есть слова?</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lyrics" id="lyrics_yes" value="lyrics_yes"
                                checked>
                            <label class="form-check-label" for="lyrics_yes">
                                Да
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="lyrics" id="lyrics_no" value="lyrics_no">
                            <label class="form-check-label" for="lyrics_no">
                                Нет
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="track_price" class="modal-p">Стоимость готового трека</label>
                <input type="number" class="form-control modal-input" id="track_price" name="track_price" placeholder="100">
            </div>
            <div class="form-group mt-3">
                <label for="track_price_usd" class="modal-p">Стоимость готового трека (USD)</label>
                <input type="number" class="form-control modal-input" id="track_price_usd" name="track_price_usd" placeholder="100">
            </div>


            <button type="submit" class="btn mt-3" style="background-color:#ffbfbe;color:#fff; font-size:16px">Сохранить</button>

        </div>
    </form>
@endsection
