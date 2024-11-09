@extends('layouts.admin')
@section('title')
    <h3>Редактировать название выступления</h3>
@endsection

@section('buttons')
    <i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
    <a href="/admin/performance" class=" mt-3" style="font-size:18px">Вернуться к списку выступлений</a>
@endsection

@section('page')
    <form action="/admin/performance/update" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="form-group">
                <label for="title_ru" class="modal-p">Заголовок на русском</label>
                <input type="text" class="form-control modal-input" id="title_ru" name="title_ru"
                    placeholder="Введите текст" value="{{ $item->title_ru }}">
            </div>
            <div class="form-group mt-3">
                <label for="title_en" class="modal-p">Заголовок на английском</label>
                <input type="text" class="form-control modal-input" id="title_en" name="title_en"
                    placeholder="Введите текст" value="{{ $item->title_en }}">
            </div>
            <button type="submit" class="btn mt-3"
                style="background-color:#ffbfbe;color:#fff; font-size:16px">Сохранить</button>
        </div>
    </form>
@endsection
