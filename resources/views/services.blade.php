@extends('layouts.base')
@section('content')
    @php
        $services_item_ru = [
            [
                'title' => "Компоновка из 1 трека\nКомпоновка из 2-х и более треков\nв один",
                'descr' =>
                    "Возможны изменения в меньшую\nи большую суммы в зависимости\nот сложности работы и длительности трека.\nПредоставляется до 5 вариантов компоновки,\nпоследующие варианты оплачиваются\nкак новая компоновка. ",
                'price' => "1500 рублей\n 2000 рублей",
                'href' => '',
            ],
            [
                'title' => 'Компоновка музыки по готовому упражнению',
                'descr' =>
                    "Нужно заменить музыку при этом\nсохранив упражнение? Пришлите\nвидео с программой и выбранную\nмузыку на замену, скомпонуем\nтрек под уже готовую программу",
                'price' => '1500 рублей',
                'href' => '',
            ],
            [
                'title' => 'Подбор музыки',
                'descr' => "Подборка из 30 композиций\nс разным по длительности временем,\nв соответствии с запросом:\nпо темпу, жанру, со словами, без слов.\n
                 Подобранная музыка будет\nмаксимально приближена\nк вашему запросу",
                'price' => '3000 рублей',
                'href' => '',
            ],
            [
                'title' => 'Доработка вашего готового трека',
                'descr' => "1. Добавить 'пик'\n2. Исправить переходы (стыки)\n3. Изменить громкость трека\n",
                'price' => '100 рублей',
                'href' => '',
            ],
            [
                'title' => 'Готовые треки из коллекции',
                'descr' => 'Прослушать треки',
                'price' => '700 рублей',
                'href' => '/catalog',
            ],
        ];
        $services_item_en = [
            [
                'title' => "1-TRACK CUT\n CUT OF 2 OR MORE TRACKS INTO ONE",
                'descr' => "CAN BE CHANGED IN SMALLER OR LARGER AMOUNTS DEPENDING ON THE COMPLEXITY OF THE WORK AND THE LENGTH OF THE TRACK.
5 CUT OPTIONS, SUBSEQUENT OPTIONS ARE CHARGED AS A NEW ORDER",
                'price' => "20$\n30$",
                'href' => '',
            ],
            [
                'title' => 'CUT MUSIC FOR A READY-MADE EXERCISE',
                'descr' =>
                    'NEED TO CHANGE THE MUSIC WHILE KEEPING THE EXERCISE? SEND A VIDEO WITH THE PROGRAM AND THE SELECTED MUSIC FOR REPLACEMENT, WE WILL CUT THE TRACK UNDER THE READY-MADE PROGRAM',
                'price' => '20$',
                'href' => '',
            ],
            [
                'title' => 'SELECTION OF MUSIC',
                'descr' => "A SELECTION OF 30 SONGS WITH DIFFERENT DURATION OF TIME, ACCORDING TO THE REQUEST: BY TEMPO, GENRE, WITH WORDS, WITHOUT WORDS.\n
                THE SELECTED MUSIC WILL BE AS CLOSE AS POSSIBLE TO YOUR REQUEST",
                'price' => '40$',
                'href' => '',
            ],
            [
                'title' => 'FINALIZING YOUR FINISHED TRACK',
                'descr' => "1. ADD 'PEAK'\n2. FIX TRANSITIONS\n3. CHANGE THE VOLUME OF THE TRACK\n",
                'price' => '2$',
                'href' => '',
            ],
            [
                'title' => 'READY-MADE MUSIC FOR ROUTINE',
                'descr' => 'LISTEN TO TRACKS',
                'price' => '10$',
                'href' => '/catalog',
            ],
        ];
        $services_item = [];
        if (app()->getLocale() == 'ru') {
            $services_item = $services_item_ru;
        } else {
            $services_item = $services_item_en;
        }

    @endphp
    <div class="services">
        <p class="page-title text-center">{{ __('common.our_services') }}</p>
        <div class="row">

            <div class="col-lg-7 col-md-8 col-sm-9 col-10 m-auto d-flex flex-column ">
                {{-- <div class=" page-line"></div> --}}
                <div class="title-dash m-auto"></div>
                <div class="serv-block">
                    @foreach ($services_item as $service)
                        <div class="d-flex justify-content-between serv-text">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-3">
                                <p class="serv-title">{{ $service['title'] }}</p>
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-5 col-5">
                                @if ($loop->last)
                                    <a class="serv-descr" href="{{ $service['href'] }}">
                                        <p class="serv-descr-last">{!! nl2br($service['descr']) !!}</p>
                                    </a>
                                @else
                                    <p class="serv-descr">{!! nl2br($service['descr']) !!}</p>
                                @endif
                            </div>
                            <p class="serv-price">{!! nl2br($service['price']) !!}</p>
                        </div>
                    @endforeach

                </div>
                <div class="accordion desktop-none" id="accordionExample">
                    @foreach ($services_item as $service)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $loop->index }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $loop->index }}" aria-expanded="true"
                                    aria-controls="collapse{{ $loop->index }}">
                                    {!! nl2br($service['title']) !!}
                                </button>
                            </h2>
                            <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    @if ($loop->last)
                                        <a class="serv-descr" href="{{ $service['href'] }}">
                                            <p class="serv-descr-last">{!! nl2br($service['descr']) !!}</p>
                                        </a>
                                    @else
                                        <p class="serv-descr">{!! nl2br($service['descr']) !!}</p>
                                    @endif
                                    <p class="serv-price">{!! nl2br($service['price']) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

        <a data-bs-toggle="modal" data-bs-target="#applyModalTop">

            <div class="d-flex justify-content-center align-items-center">
                <div class="request-button" wire:click="showApplyModal">
                    {{ __('common.leave_a_request') }}
                </div>
            </div>
        </a>
        {{-- @livewire('left-apply') --}}
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" >
    Launch demo modal
  </button> --}}

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
