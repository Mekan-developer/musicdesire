<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords"
        content="музыка для художественной гимнастики,музыка для фигурного катания,музыка для хг,
        музыка для КЮР,музыка для булав,музыка для скакалки,музыка для бп,музыка для мяча,музыка для обруча,
        компоновка музыки,нарезка музыки,обрезка музыки,компоновка музыки,готовая музыка для хг,заказать обрезку музыки,заказать нарезку музыки" />
    <meta name="description"
        content="Приветствую! Меня зовут Валерия, я Мастер спорта России по художественной
        гимнастике. С 2016 года мы
        с командой компонуем музыку для танцевальных видов спорта: художественная гимнастика, фигурное
        катание, синхронное плавание и КЮР.Компонуем музыку за пару часов. Имеется большая коллекция готовой музыки для упражнений. В заказ включено 5 вариантов компоновки. Более 500 положительных отзывов. Наши компоновки звучат на Чемпионатах Мира." />
    <title>@yield('title')</title>
    @include('layouts.styles')
    @livewireStyles

</head>

<body @yield('id')>
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
        <div><img src="https://mc.yandex.ru/watch/97741897" style="position:absolute; left:-9999px;" alt="" />
        </div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <header>
        <div>
            @livewire('left-apply-top')
        </div>
        <div class="d-flex justify-content-between header-sub row">
            <div class="menu">
                <div class="d-flex col-lg-5 col-md-5 justify-content-start">
                    <a href="/about" class="text-uppercase">{{ __('common.about') }}</a>
                    <a href="/services" class="text-uppercase">{{ __('common.services') }}</a>
                    <a href="/catalog" class="text-uppercase">{!! nl2br(__('common.tracks')) !!}</a>
                    {{-- <a href="/performance" class="d-block text-uppercase" id="trigPerf"> --}}
                    <div class="cust-drop">
                        <div class="d-flex ">
                            <p class="a-with-i text-uppercase">{{ __('common.our_works') }}</p>
                            <i class="fa-solid fa-chevron-down i my-auto"></i>
                        </div>
                        <div class="cust-drop-menu" id="dropdPerf">
                            <a href="/reviews" class="cust-drop-a">{{ __('common.reviews') }}</a>
                            <a href="/performance">{{ __('common.performance') }}</a>
                        </div>
                    </div>
                    {{-- </a> --}}
                </div>
                <div class="logo col-lg-2 col-md-1 text-center">
                    <a class="no-margin" href="/home">
                        <img src="{{ asset('assets/images/logo_rgb.png') }}">
                    </a>
                </div>
                <div class="d-flex col-lg-5 col-md-6 justify-content-end align-items-baseline">
                    <a href="/contacts" class="text-uppercase">{{ __('common.contacts') }}</a>
                    @auth
                        <a href="/account" class="text-uppercase">
                            {{ __('common.account') }}
                        </a>
                    @else
                        <a href="/register" class="text-uppercase">
                            {{ __('common.register') }}
                        </a>
                    @endauth

                    @livewire('cart-component')


                    <a id="dropdownLang" class=" dropdown-toggle text-uppercase" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ app()->getLocale() }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLang">
                        <a class="dropdown-item" href="/language/ru/?t={{ time() }}">
                            {{ __('Русский') }}
                        </a>
                        <a class="dropdown-item" href="/language/en/?t={{ time() }}">
                            {{ __('English') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="burger-menu" data-bs-toggle="modal" data-bs-target="#menuModal">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>

        <div class="modal fade right" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content menu-mobile">
                    <div class="modal-header">
                        <a class="" href="/">
                            <img src="{{ asset('assets/images/black_subline_rgb.png') }}" alt="" width="150"
                                height="48">
                        </a>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body ">
                        <div class="col-sm-6 d-flex flex-column ">
                            @auth
                                <a href="/account" class="mobile-menu-a text-uppercase">
                                    {{ __('common.account') }}
                                </a>
                            @else
                                <a href="/register" class="mobile-menu-a text-uppercase">
                                    {{ __('common.register') }}
                                </a>
                            @endauth
                            <a href="/about" class="mobile-menu-a text-uppercase">{{ __('common.about') }}</a>
                            <a href="/services" class="mobile-menu-a text-uppercase">{{ __('common.services') }}</a>
                            <a href="/catalog" class="mobile-menu-a text-uppercase">{{ __('common.tracks') }}</a>
                            <a data-bs-toggle="modal" data-bs-target="#cartModal"
                                class="mobile-menu-a text-uppercase">{{ __('common.cart') }}</a>
                            {{-- @livewire('cart-mobile-component') --}}
                            <a href="/performance"
                                class="mobile-menu-a text-uppercase">{{ __('common.our_works') }}</a>
                            <a href="/reviews" class="mobile-menu-a text-uppercase">{{ __('common.reviews') }}</a>
                            <a href="/contacts" class="mobile-menu-a text-uppercase">{{ __('common.contacts') }}</a>
                        </div>
                        <div class="d-flex">
                            <img class="mobile-menu-icon" style="cursor: pointer;"
                                onclick="window.open('https://vk.com/musicdesire');"
                                src="{{ asset('assets/images/vk.svg') }}" alt="">
                            <img class="mobile-menu-icon" style="cursor: pointer;"
                                onclick="window.open('https://t.me/panferovaleriya');"
                                src="{{ asset('assets/images/tg.svg') }}" alt="">
                            <img class="mobile-menu-icon" style="cursor: pointer;"
                                onclick="window.open('https://api.whatsapp.com/send/?phone=%2B79992035959&text&type=phone_number&app_absent=0');"
                                src="{{ asset('assets/images/wh.svg') }}" alt="">
                            <img class="mobile-menu-icon" style="cursor: pointer;"
                                onclick="window.open('https://www.instagram.com/panferovaleriya/');"
                                src="{{ asset('assets/images/in.svg') }}" alt="">
                        </div>
                        <div class="d-flex" style="margin-top:30px">
                            <a class="text-uppercase " href="/language/ru/?t={{ time() }}" style="font-size:16px !important; {{ app()->getLocale() == 'ru' ? 'color: #ff7472 !important; font-weight:bold' : '' }}">
                                RU
                            </a> 
                            <a class="text-uppercase" href="/language/en/?t={{ time() }}" style="font-size:16px !important;  {{ app()->getLocale() == 'en' ? 'color: #ff7472 !important; font-weight:bold' : '' }}">
                                EN
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>


    @yield('content')
    <footer>
        <div class="row privacy">
            <div class="d-flex footer-flex">
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <div class="d-flex flex-column">
                        <a href="/about" class="text-uppercase">{{ __('common.about') }}</a>
                        <a href="/services" class="text-uppercase">{{ __('common.services') }}</a>
                        <a href="/catalog" class="text-uppercase">{{ __('common.tracks') }}</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 footer-block">
                    <div class="d-flex flex-column">
                        <a href="" data-bs-toggle="modal" data-bs-target="#applyModalTop"
                            class="text-uppercase">{{ __('common.order_a_composition') }}</a>
                        <a href="/reviews" class="text-uppercase">{{ __('common.reviews') }}</a>
                        <a href="/contacts" class="text-uppercase">{{ __('common.contacts') }}</a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 footer-block ">
                    <div class="d-flex flex-column">
                        <a href="/oferta" class="text-uppercase">{{ __('common.offer') }}</a>
                        <a href="/privacy" class="text-uppercase">{{ __('common.privacy') }}</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6  footer-block ">
                    <div class="d-flex flex-column">
                        <a href="https://vk.com/musicdesire" target="_blank">VK</a>
                        <a href="https://t.me/panferovaleriya" target="_blank">TELEGRAM</a>
                        <a href="https://api.whatsapp.com/send/?phone=%2B79992035954&text&type=phone_number&app_absent=0"
                            target="_blank">WHATSAPP</a>
                        <a href="https://www.instagram.com/panferovaleriya/" target="_blank">INSTAGRAM</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-12 d-flex justify-content-between copyrights">
            <a href="https://musicdesire.ru/">
                <p>
                    MUSIC DESIRE
                </p>
            </a>
            <p>
                © 2024 REV — all rights reserved
            </p>
        </div>
    </footer>
    @include('layouts.scripts')
    @livewireScripts
    @yield('page-script')
    @yield('page-script2')
    @yield('page-script3')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Получаем ссылку на кнопку и меню
            var dropdownToggle = document.getElementById('dropdownLang');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            // Отслеживаем событие наведения курсора на кнопку
            dropdownToggle.addEventListener('mouseover', function() {
                // Показываем меню и устанавливаем атрибут aria-expanded в true
                dropdownMenu.classList.add('show');
                dropdownToggle.setAttribute('aria-expanded', 'true');
            });

            // Отслеживаем событие ухода курсора с меню
            dropdownMenu.addEventListener('mouseleave', function() {
                // Скрываем меню и устанавливаем атрибут aria-expanded в false
                dropdownMenu.classList.remove('show');
                dropdownToggle.setAttribute('aria-expanded', 'false');
            });
        });
    </script>

</body>

</html>
