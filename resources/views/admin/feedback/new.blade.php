@extends('layouts.admin')
@section('title')
    <h3>Добавить отзыв</h3>
@endsection

@section('buttons')
<i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
<a href="admin/feedback" class=" mt-3" style="font-size:18px">Вернуться к списку треков</a>
@endsection

@section('page')
    <form action="/admin/feedback/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5">
            <div class="form-group mb-3">
                <label for="image" class="modal-p">Фото</label>
                <input type="file" accept="image/*" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mb-3">
                <label for="name" class="modal-p">Имя</label>
                <input type="text" class="form-control modal-input" id="name" name="name"
                    placeholder="Введите имя пользователя">
            </div>
            <div class="form-group mb-3">
                <label for="content" class="modal-p">Содержание отзыва</label>
                <input type="text" class="form-control modal-input" id="content" name="content"
                    placeholder=".....">
            </div>
            <div class="form-group mb-3">
                <label for="link" class="modal-p">Ссылка</label>
                <input type="text" class="form-control modal-input" id="link" name="link"
                    placeholder="https://vk.com">
            </div>
            <button type="submit" class="btn mt-3"
                style="background-color:#ffbfbe;color:#fff; font-size:16px">Сохранить</button>
        </div>
    </form>
@endsection
