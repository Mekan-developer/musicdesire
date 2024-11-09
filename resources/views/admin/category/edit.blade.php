@extends('layouts.admin')
@section('title')
    <h3>Редактировать категорию</h3>
@endsection

@section('buttons')
    <i class="fa-light fa-arrow-left  mt-3" style="font-size:18px; padding-right:15px"></i>
    <a href="admin/categories" class=" mt-3" style="font-size:18px">Вернуться к списку треков</a>
@endsection

@section('page')
    <form action="/admin/categories/update/{{ $item->id }}" method="post">
        @csrf
        <div class="container mt-5">
            <div class="form-group">
                <label for="category_name_ru">Название на русском</label>
                <input type="text" class="form-control" id="category_name_ru" name="category_name_ru"
                    placeholder="Введите текст" value="{{ $item->name_ru }}">
            </div>
            <div class="form-group mt-3">
                <label for="category_name_en">Название на английском</label>
                <input type="text" class="form-control" id="category_name_en" name="category_name_en"
                    placeholder="Введите текст" value="{{ $item->name_en }}">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </div>
    </form>
@endsection
