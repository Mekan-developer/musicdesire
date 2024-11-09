@extends('layouts.base')
@section('id')
    id="reviews"
@endsection
@section('content')
    <div class=" reviews">
        <div class="row justify-content-center">
            <div class="d-flex flex-column justify-content-center align-items-center text-center">
                <p class=" page-title">{{ __('common.reviews') }}</p>
                <div class="title-dash"></div>
            </div>
            <div class="reviews-slider">
                @foreach ($items as $item)
                    <div class="col-lg-6 col-sm-12">
                        <div class="d-flex flex-column review-card"> <!-- Добавлен класс d-flex и flex-column -->
                            <img src="{{ asset('assets/images/review.png') }}" alt="" width="44"
                                class="review-quote">
                            <p class="review-text">{{ $item->content }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ $item->link }}">
                                    <div class="d-flex justify-content-start align-items-center">
                                        <div class="dash my-auto"></div>
                                        <p class="review-author">{{ $item->name }}</p>
                                    </div>
                                </a>
                                <img src="{{ asset('storage/feedback/' . $item->image) }}" alt="" width="50px"
                                    height="50px" style="border-radius: 50%">
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column review-card"> <!-- Добавлен класс d-flex и flex-column -->
                        <img src="{{ asset('assets/images/review.png') }}" alt="" width="44"
                            class="review-quote">
                        <p class="review-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when
                            an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries.</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="dash my-auto"></div>
                                <p class="review-author">UI Soup</p>
                            </div>
                            <img style="cursor:pointer" src="{{ asset('assets/images/clarity_eye-line.png') }}"
                                alt="" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column review-card"> <!-- Добавлен класс d-flex и flex-column -->
                        <img src="{{ asset('assets/images/review.png') }}" alt="" width="44"
                            class="review-quote">
                        <p class="review-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when
                            an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries.</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="dash my-auto"></div>
                                <p class="review-author">UI Soup</p>
                            </div>
                            <img src="{{ asset('assets/images/clarity_eye-line-transparent.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="d-flex flex-column review-card"> <!-- Добавлен класс d-flex и flex-column -->
                        <img src="{{ asset('assets/images/review.png') }}" alt="" width="44"
                            class="review-quote">
                        <p class="review-text">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when
                            an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries.</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="dash my-auto"></div>
                                <p class="review-author">UI Soup</p>
                            </div>
                            <img style="cursor:pointer" src="{{ asset('assets/images/clarity_eye-line.png') }}"
                                alt="" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        </div>
                    </div>
                </div> --}}

            </div>
            <div class="nav-dots d-flex justify-content-center align-items-center">
                <div class="dot"></div>
                <div class="dot "></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true"
        style="width:100%">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content acc-modal-content">
                <div class="modal-header">
                    <h5 class="modal-title account-title" id="reviewProfileLabel">{{ __('common.review') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body d-flex flex-column justify-content-center">
                    {{-- <input type="file"id="avatarInput" style="display: none;">
                    <p class="modal-p">{{ __('common.your_name') }}</p>
                    <input type="text" wire:model="user_name" class="mb-35 modal-input"> --}}
                    <img src="{{ asset('assets/images/fake-review.jpg') }}" alt="">
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-primary register-btn">
                        <div class="d-flex">
                            <p class="register-btn-p">{{ __('common.save') }}</p>
                            <i class="fa-light fa-chevron-right my-auto"></i>
                        </div>
                    </button>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(
                k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(97741897, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
            ecommerce: "dataLayer"
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/97741897" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
@endsection
