@extends('layouts.base')

@section('id')
    id="home"
@endsection
@php
    $main_subtitle_ru = 'Музыка для художественной гимнастики и фигурного катания';
    $main_subtitle_en = 'Music for rhythmic gymnastics and figure skating';
    $main_subtitle = '';
    if (app()->getLocale() == 'ru') {
        $main_subtitle = $main_subtitle_ru;
    } else {
        $main_subtitle = $main_subtitle_en;
    }
@endphp
@section('content')
    <div class="main-photo d-flex flex-column justify-content-center align-items-center">
        <p class="main-title">Music Desire</p>
        <p class="main-subtitle text-center">{!! nl2br($main_subtitle) !!}</p>
    </div>
    <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();
    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
 
    ym(97741897, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true,
         webvisor:true,
         ecommerce:"dataLayer"
    });
 </script>
 <noscript><div><img src="https://mc.yandex.ru/watch/97741897" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
 <!-- /Yandex.Metrika counter -->
@endsection
