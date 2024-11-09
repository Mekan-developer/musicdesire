@extends('layouts.admin')
@section('title')
    <h3>Каталог треков</h3>
@endsection

@section('buttons')
    <a href="/admin/tracks/new" class="btn cust-btn mt-3">Создать</a>
@endsection

@section('page')
    <div class="item-list col-lg-10 mt-4">
        @php
            $locale = app()->getLocale() ?? 'ru';
        @endphp
        @foreach ($all as $item)
            @php
                $songtitle = '';
                if ($locale == 'ru') {
                    $songtitle = $item->name_ru;
                } else {
                    $songtitle = $item->name_en;
                }
            @endphp
            <div class="item">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <p style="font-size:16px; margin-right:10px;margin-top:auto; margin-bottom:auto;">
                            {{ $songtitle }}

                    </p>
                        <a href="/admin/tracks/edit/{{ $item->id }}?t={{ time() }}" class="no-margin"><i class="fa-light fa-pencil"
                                style="font-size:18px;margin-right:10px; color:#ff7472"></i></a>
                        <a href="/admin/tracks/delete/{{ $item->id }}" class="no-margin"><i class="fa-light fa-trash-can"
                                style="font-size:18px;color:#ff7472"></i></a>
                        
                    </div>
                    <div class="d-flex align-items-left" style="color:#000000;width:60%;margin:0 20px">
                        @if( $item->locations->count() > 0 )
                            <small><b>Блокировка:</b> 
                                @php
                                    $n = 0;
                                @endphp
                                @foreach( $item->locations as $loc )
                                    @if ($n != 0 )
                                        , 
                                    @endif
                                    {{ $loc->title }}
                                    @php
                                        $n++;
                                    @endphp
                                @endforeach
                            </small>
                        @endif
                    </div>
                    <button class="btn cust-btn play-button" data-url="{{ asset('storage/tracks/' . $item->file) }}"
                        data-title = "{{ $songtitle }}" style="height:45px">Воспроизвести</button>
                </div>
                {{-- @if ($locale == 'ru')
                    {{ $item->name_ru }}
                @else
                    {{ $item->name_en }}
                @endif --}}
                <div>

                </div>
            </div>
        @endforeach
        {{-- <select id="trackSelector">
            <select id="trackSelector" hidden>
            @foreach ($all as $item)
                <option value="{{ asset('storage/tracks/' . $item->file) }}">{{ $item->name_ru }}</option>
            @endforeach
        </select> --}}
    </div>
@endsection
@section('bottom-part')
    @include('components.player')
@endsection
