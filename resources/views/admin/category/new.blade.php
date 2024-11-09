@extends('layouts.admin')
@section('title')
    <h3>Создать новую категорию</h3>
@endsection

@section('buttons')
<i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
<a href="admin/categories" class=" mt-3" style="font-size:18px">Вернуться к списку треков</a>
@endsection

@section('page')
    <form action="/admin/categories/create" method="post">
        @csrf
        <div class="container mt-5">
            <div class="form-group">
                <label for="category_name_ru" class="modal-p">Название на русском</label>
                <input type="text" class="form-control modal-input" id="category_name_ru" name="category_name_ru"
                    placeholder="Введите текст">
            </div>
            <div class="form-group mt-3">
                <label for="category_name_en" class="modal-p">Название на английском</label>
                <input type="text" class="form-control modal-input" id="category_name_en" name="category_name_en"
                    placeholder="Введите текст">
            </div>
            <button type="submit" class="btn mt-3"
                style="background-color:#ffbfbe;color:#fff; font-size:16px">Сохранить</button>
        </div>
    </form>
@endsection
