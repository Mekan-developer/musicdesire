@extends('layouts.base')
@section('id')
    id="about"
@endsection
@section('content')
    <div class="about-container" style="padding-top:150px">

        <div class="row ">
            <div class="col-lg-12">
                <div class="d-flex about justify-content-center align-items-center">
                    <div class="col-lg-4 col-md-3">
                        <img src="{{ asset('assets/images/curveline.png') }}" alt="" id="frst-img">
                    </div>
                    <div class="col-lg-4">
                        <div class="about-text d-flex flex-column justify-content-center ">
                            <p class="about-title-p d-flex justify-content-center align-items-center">MUSIC DESIRE</p>
                            <div class="title-dash m-auto"></div>
                            <p class="about-paragraph">{{ __('common.about_1') }}</p>
                            <ul class="about-ul">
                                <li>{{ __('common.about_2') }}</li>
                                <li>{{ __('common.about_3') }}</li>
                                <p style="color:#808080">{{ __('common.about_4') }}</p>
                                <li>{{ __('common.about_5') }}</li>
                                <li>{{ __('common.about_6') }}</li>
                                <li>{{ __('common.about_7') }}</li>
                            </ul>
                            <div class="about-form">
                                <p>{{ __('common.about_8') }}</p>
                                <p>{{ __('common.about_9') }}<a data-bs-toggle="modal"
                                        data-bs-target="#applyModalTop">{{ __('common.about_10') }}</a></p>
                                <p>{{ __('common.about_11') }}<a href="/contacts">{{ __('common.about_12') }}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3">
                        <img src="{{ asset('assets/images/balerina.png') }}" alt="" id="scnd-img">
                    </div>
                </div>
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
