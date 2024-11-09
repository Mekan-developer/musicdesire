@extends('layouts.app')

@section('content')
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .sidebar h2 {
            margin-bottom: 10px;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .item-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 10px;
        }

        .item {
            /* height: 45px; */
            /* background-color: #adadad; */
            border: 1px #ffd6d5 solid;
            padding: 10px 10px 10px 20px;
            border-radius: 5px;
            color: #fff;
            margin-right: 25px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            /* Распределение между началом и концом */
            align-items: center;
            /* Выравнивание элементов по центру */
            padding: 10px;
        }


        .button-container {
            /* Необходимо для группировки кнопок вместе */
            display: flex;
            transition: all 0.3s ease
        }

        .button-container:hover {
            color: #ff7472;
            background-color: none !important;
        }

        .button-container:hover a.cust-btn {
            color: #FFF !important;
        }

        .bottom-container {
            position: fixed;
            bottom: 0;
            left: 200px;
            /* Отступ слева, чтобы соответствовать вашему .main */
            width: calc(100% - 200px);
            /* Вычитаем ширину боковой панели */
            background-color: #f8f9fa;
            /* Пример цвета фона */
            padding: 10px;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            /* Тень для визуального отделения */
        }

        input#file::file-selector-button {
            background-color: #333;
            color: #fff;
            border-radius: 7px;
        }

        input#file_full::file-selector-button {
            background-color: #333;
            color: #fff;
            border-radius: 7px;
        }
    </style>
    <div class="sidebar">
        <h2>Категории</h2>
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link {{ Request::is('admin/categories') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"
                href="/admin/categories/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/categories') ? 'color: white !important' : '' }} ">Категории треков</a>

            <a class="nav-link {{ Request::is('admin/tracks') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"
                href="/admin/tracks/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/tracks') ? 'color: white !important' : '' }} ">Каталог треков</a>

            <a class="nav-link {{ Request::is('admin/applies') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"
                href="/admin/applies/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/applies') ? 'color: white !important' : '' }} ">Заявки пользователей</a>
            <a class="nav-link {{ Request::is('admin/orders') ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"
                href="/admin/orders/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/orders') ? 'color: white !important' : '' }} ">Заказы</a>

            <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" id="v-pills-home-tab"
                data-toggle="pill" href="/admin/users/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/users') ? 'color: white !important' : '' }} ">База пользователей</a>

            <a class="nav-link {{ Request::is('admin/feedback') ? 'active' : '' }}" id="v-pills-home-tab"
                data-toggle="pill" href="/admin/feedback/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/feedback') ? 'color: white !important' : '' }} ">Отзывы</a>

            <a class="nav-link {{ Request::is('admin/performance') ? 'active' : '' }}" id="v-pills-home-tab"
                data-toggle="pill" href="/admin/performance/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/performance') ? 'color: white !important' : '' }} ">Выступления</a>

            <a class="nav-link {{ Request::is('admin/services') ? 'active' : '' }}" id="v-pills-home-tab"
                data-toggle="pill" href="/admin/services/?t={{ time() }}" role="tab" aria-controls="v-pills-home" aria-selected="true"
                style=" {{ Request::is('admin/performance') ? 'color: white !important' : '' }} ">Услуги</a>
        </div>
    </div>

    <div class="main">
        <div class="flex-container">
            @yield('title')
            <div class="button-container align-items-center">
                @yield('buttons')
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('page')
        <div class="bottom-container">
            @yield('bottom-part')
        </div>
    </div>
@endsection
