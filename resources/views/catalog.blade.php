{{-- @extends('layouts.app') --}}
@extends('layouts.base')

@section('content')
    <div class="catalog-container">
        <div class="row">
            <div class="col-lg-12">
                <div class=" playlist ">
                    <div class="tracks  col-lg-8 col-md-12 col-sm-12">
                        @for ($i = 0; $i < 20; $i++)
                            <div class="track d-flex justify-content-between align-items-center">
                                <img src="{{ asset('assets/images/play.png') }}" alt="" width="30" height="30">
                                <p class="my-auto">Фигурное катание трек №1</p>
                                <p class="my-auto">3:12</p>
                                <img src="{{ asset('assets/images/heart.png') }}" alt="" width="20"
                                    height="20">
                                <img src="{{ asset('assets/images/cart.png') }}" alt="" width="20"
                                    height="20">
                            </div>
                        @endfor
                    </div>
                    <div class="filter col-lg-4 col-md-12 col-sm-12">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Жанр
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox2">
                                                    <label class="form-check-label" for="checkbox2">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox3">
                                                    <label class="form-check-label" for="checkbox3">Русский</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox4">
                                                    <label class="form-check-label" for="checkbox4">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox5">
                                                    <label class="form-check-label" for="checkbox5">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox6">
                                                    <label class="form-check-label" for="checkbox6">Русский</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Язык
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox2">
                                                    <label class="form-check-label" for="checkbox2">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox3">
                                                    <label class="form-check-label" for="checkbox3">Русский</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox4">
                                                    <label class="form-check-label" for="checkbox4">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox5">
                                                    <label class="form-check-label" for="checkbox5">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox6">
                                                    <label class="form-check-label" for="checkbox6">Русский</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Длительность
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox2">
                                                    <label class="form-check-label" for="checkbox2">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox3">
                                                    <label class="form-check-label" for="checkbox3">Русский</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox4">
                                                    <label class="form-check-label" for="checkbox4">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox5">
                                                    <label class="form-check-label" for="checkbox5">Русский</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox6">
                                                    <label class="form-check-label" for="checkbox6">Русский</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Слова в треке
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default,
                                        until the
                                        collapse plugin adds the appropriate classes that we use to style each element.
                                        These
                                        classes
                                        control the overall appearance, as well as the showing and hiding via CSS
                                        transitions. You
                                        can
                                        modify any of this with custom CSS or overriding our default variables. It's also
                                        worth
                                        noting
                                        that just about any HTML can go within the <code>.accordion-body</code>, though the
                                        transition
                                        does limit overflow.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="d-flex justify-content-between song-menu">
                    <div class="col-lg-3 col-sm-12">
                        <p class="song-title">Название песни</p>
                        {{-- <p class="author-title">Исполнитель</p> --}}
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="d-flex align-items-center justify-content-center play-act">
                            <img src="{{ asset('assets/images/previous.png') }}" alt="" width="24"
                                height="24">
                            <img src="{{ asset('assets/images/play-inlist.png') }}" alt="" width="36"
                                height="36">
                            <img src="{{ asset('assets/images/next.png') }}" alt="" width="24"
                                height="24">
                        </div>
                        <div class="d-flex align-items-start">
                            <p class="cur-time">0:00</p>
                            <input type="range" class="duration-range" id="customRange1" value="0">
                            <p class="total-time">04:24</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="d-flex align-items-center justify-content-center actions">
                            <img src="{{ asset('assets/images/heart.png') }}" alt="" width="24"
                                height="24" class="favorite">
                            <img src="{{ asset('assets/images/volume-high.png') }}" alt="" width="24"
                                height="24" class="volume">
                            <input type="range" class=" volume-range" id="customRange1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="sidebar">
        <h2>Категории</h2>
        <ul>
            <li><a href="">Категория 1</a></li>
            <li><a href="">Категория 2</a></li>
            <li><a href="">Категория 3</a></li>
            <li><a href="">Категория 4</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="item-list">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
        <button class="btn btn-primary mt-3">Загрузить еще</button>
    </div> --}}
 
@endsection
