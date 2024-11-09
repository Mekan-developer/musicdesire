@extends('layouts.base')
@section('content')
    <div class="d-flex contacts align-items-center justify-content-center">
        {{-- <img src="{{asset('assets/images/notes_2.png')}}" alt="" id="frst-notes" class="img-fluid">
        <img src="{{asset('assets/images/notes_1.png')}}" alt="" id="scnd-notes" class="img-fluid"> --}}
        {{-- <img src="{{asset('assets/images/headphones.png')}}" alt="" id="frst-hdphns" class="img-fluid"> --}}
        <img src="{{ asset('assets/images/contacts-01.svg') }}" alt="" class="img-fluid" id="cont1">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <p class="contacts-title d-flex ">{{ __('common.contacts') }}</p>
            <div class="title-dash"></div>
            <a href="mailto:musicdesire@gmail.com"
                class="m-cust-0 contacts-mail d-flex justify-content-center">yourmusicdesire@gmail.com</a>
            <p class="contacts-mail text-center" style="font-size: 14px !important">{{ __('common.graphic') }}</p>
            <div class="d-flex justify-content-center contacts-icons">
                <img style="cursor: pointer;" onclick="window.open('https://vk.com/musicdesire');"
                    src="{{ asset('assets/images/vk.svg') }}" alt="">
                <img style="cursor: pointer;" onclick="window.open('https://t.me/panferovaleriya');"
                    src="{{ asset('assets/images/tg.svg') }}" alt="">
                <img style="cursor: pointer;"
                    onclick="window.open('https://api.whatsapp.com/send/?phone=%2B79992035959&text&type=phone_number&app_absent=0');"
                    src="{{ asset('assets/images/wh.svg') }}" alt="">
                <img style="cursor: pointer;" onclick="window.open('https://www.instagram.com/panferovaleriya/');"
                    src="{{ asset('assets/images/in.svg') }}" alt="">
            </div>

        </div>
        <img src="{{ asset('assets/images/contacts-02.svg') }}" alt="" class="img-fluid" id="cont2">
        {{-- <img src="{{asset('assets/images/headphones.png')}}" alt="" id="scnd-hdphns" class="img-fluid">
        <img src="{{asset('assets/images/notes_1.png')}}" alt="" id="thrd-notes" class="img-fluid">
        <img src="{{asset('assets/images/notes_2.png')}}" alt="" id="frth-notes" class="img-fluid"> --}}
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
