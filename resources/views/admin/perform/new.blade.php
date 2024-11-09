@extends('layouts.admin')
@section('title')
    <h3>Создать новое выступление</h3>
@endsection

@section('buttons')
    <i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
    <a href="/admin/performance" class=" mt-3" style="font-size:18px">Вернуться к списку выступлений</a>
@endsection

@section('page')
    <form action="/admin/performance/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="form-group">
                <label for="title_ru" class="modal-p">Заголовок на русском</label>
                <input type="text" class="form-control modal-input" id="title_ru" name="title_ru"
                    placeholder="Введите текст">
            </div>
            <div class="form-group mt-3">
                <label for="title_en" class="modal-p">Заголовок на английском</label>
                <input type="text" class="form-control modal-input" id="title_en" name="title_en"
                    placeholder="Введите текст">
            </div>
            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="file" class="modal-p">Выберите видео файл</label>
                        <input type="file" class="form-control  modal-input" id="video" accept="video/mp4, video/mov, video/avi, video/flv"
                            name="video">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn mt-3"
                style="background-color:#ffbfbe;color:#fff; font-size:16px">Сохранить</button>
        </div>
    </form>
@endsection
