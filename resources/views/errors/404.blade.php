@extends('layouts.base')
@section('content')
    <div class="cont-404 d-flex flex-column align-items-center">
        <div>
            <div class="relative-404">

                <p class="p-404">404</p>
                <img src="{{ asset('assets/images/music-note.png') }}" alt="" class="first-404">
                <img src="{{ asset('assets/images/arrow-curve-to-right.png') }}" alt="" class="second-404">
                <img src="{{ asset('assets/images/arrow-curve.png') }}" alt="" class="third-404">
                <img src="{{ asset('assets/images/arrow-straight.png') }}" alt="" class="fourth-404">
            </div>
            <p class="p-404-title">Кажется, такой страницы не существует!</p>
            <p class="p-404-sub">Возвращайтесь на главную или просмотрите наш каталог</p>
            <div class="d-flex justify-content-between">
                <button class=" black-btn" onclick="document.location='/'">Главная</button>
                <button class="outlined-btn" onclick="document.location='/catalog'">Каталог</button>
            </div>
        </div>
        <div class="d-flex hidden-imgs">
            <img src="{{ asset('assets/images/shining.png') }}" alt="" >
            <img src="{{ asset('assets/images/dots.png') }}" alt="" >
            <img src="{{ asset('assets/images/music.png') }}" alt="" >
        </div>
    </div>
@endsection
