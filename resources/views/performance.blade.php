@extends('layouts.base')
@section('content')
    <div class="performance">
        @php
            $ru = app()->getLocale() == 'ru';
        @endphp
        <div class="performance-slider">
            @foreach ($items as $item)
                @php
                    $videotitle = '';
                    if ($ru) {
                        $videotitle = $item->title_ru;
                    } else {
                        $videotitle = $item->title_en;
                    }
                @endphp
                <div class="performance-slide">
                    <video src="{{ asset('storage/perform/' . $item->video) }}" alt="" width="" height="500"
                        controls="true" playsinline></video>

                    <p>{{ $videotitle }}</p>
                </div>
            @endforeach
        </div>
        {{-- <p class="big-word">MUSIC DESIRE</p> --}}
    </div>
@endsection
