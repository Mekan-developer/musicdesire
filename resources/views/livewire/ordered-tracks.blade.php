<div>
    @php
        $ru = app()->getLocale() == 'ru';
    @endphp
    <div class="personal-info mb-87">
        <p class="account-title">{{ __('common.bought_tracks') }}</p>
        <div class="row acc-fav-tracks">

            @foreach ($orders as $order)
                @foreach ($order->tracks as $tr)
                    @php
                        $track = $tr->trackObj;
                        $songtitle = '';
                        if ($ru) {
                            $songtitle = $track->name_ru;
                        } else {
                            $songtitle = $track->name_en;
                        }
                        $getID3 = new getID3;
                    @endphp
                    <div class="col-md-6">
                        <div class="track d-flex justify-content-between align-items-center play-button"
                            data-url="{{ asset('storage/tracks/' . $track->file) }}" data-title = "{{ $songtitle }}"
                            data-track-id="o{{ $track->id }}"
                            data-track-play-image="{{ asset('assets/images/play.png') }}"
                            data-track-pause-image="{{ asset('assets/images/pause-outlined.png') }}">
                            {{-- <img src="{{ asset('assets/images/play.png') }}" alt="" id="play_image{{ $track->id }}" width="30" height="30"> --}}
                            <div class="playiccust" id="play_imageo{{ $track->id }}"></div>

                            <p class="my-auto"> {{ $songtitle }} </p>
                            <p class="my-auto">{{ gmdate('i:s', $track->duration) }}</p>
                            @if ($track->full)
                                <a href="{{ asset('storage/tracks/' . $track->full) }}" download="{{ $songtitle }}">
                                    <div class="download"></div>
                                </a>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between when-bought-p">
                            <p>
                                {{ __('common.bought') }} {{ $order->created_at->format('d/m/Y') }}
                            </p>
                            {{-- <p>Срок до: {{ \Carbon\Carbon::parse($order->created_at)->addYears(1)->format('d/m/Y') }}
                            </p> --}}
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
