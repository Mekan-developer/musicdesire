@extends('layouts.base')
@section('content')
    <div class="about-container">
        <div class="row privacy">
            <div class="col-lg-12 privacy">
                <div class="d-flex privacy-cont  justify-content-center align-items-center">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4 col-md-8 col-sm-10">
                        <div class="about-text d-flex flex-column justify-content-center ">
                            <p class="page-title privacy text-center d-flex justify-content-center align-items-center">
                                {{ __('common.privacy') }}</p>
                            <div class="title-dash m-auto"></div>
                            {{-- <p class="privacy-paragraph privacy">{{ __('common.privacy_1') }}</p>
                            <p class="privacy-paragraph"> {{ __('common.privacy_2') }}
                            </p>
                            <p class="privacy-paragraph">
                                {{ __('common.privacy_3') }}</p>
                            <p class="serv-title privacy privacy mt-4">{{ __('common.privacy_4') }}</p>
                            <p class="privacy-paragraph">
                                {{ __('common.privacy_5') }}</p> --}}
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_1') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_2_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_2_2')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_3') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_4')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_5')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_6')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_7')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_8')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_9')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_10')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_11')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_12')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_13')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_3_14')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_4') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_4_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_4_2')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_5') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_5_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_5_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_5_3')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_6') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_4')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_5')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_6')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_7')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_8')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_9')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_10')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_11')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_12')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_6_13')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_7') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_4')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_5')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_6')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_7_7')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_8') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_8_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_8_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_8_3')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_9') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_9_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_9_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_9_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_9_4')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_10') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_4')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_5')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_6')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_10_7')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_11') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_p')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_3')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_4')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_5')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_6')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_7')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_8')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_11_9')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_12') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_12_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_12_2')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_13') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_13_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_13_2')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_14') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_14_1')) !!}
                            </p>
                            <p class="serv-title privacy mt-4">{{ __('common.privacy_15') }}</p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_15_1')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_15_2')) !!}
                            </p>
                            <p class="privacy-paragraph">
                                {!! nl2br(__('common.privacy_15_3')) !!}
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-4">
                    </div>
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
