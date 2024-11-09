<div>

    @php
        $ru = app()->getLocale() == 'ru';
    @endphp
    <div class="personal-info">
        @if (count($favorites) != 0)
            <p class="account-title">{{ __('common.favorite_tracks') }}</p>
        @endif
        <div class="row mt-3 acc-fav-tracks">
            @foreach ($favorites as $track)
                @php
                    $songtitle = '';
                    if ($ru) {
                        $songtitle = $track->name_ru;
                    } else {
                        $songtitle = $track->name_en;
                    }
                @endphp
                <div class="col-md-6">
                    <div class="track d-flex justify-content-between align-items-center play-button"
                        data-url="{{ asset('storage/tracks/' . $track->file) }}" data-title = "{{ $songtitle }}"
                        data-track-id="f{{ $track->id }}" data-track-play-image="{{ asset('assets/images/play.png') }}"
                        data-track-pause-image="{{ asset('assets/images/pause-outlined.png') }}">
                        {{-- <img src="{{ asset('assets/images/play.png') }}" alt=""
                            id="play_image{{ $track->id }}" width="30" height="30"> --}}
                            <div class="playiccust" id="play_imagef{{ $track->id }}"></div>
                        <p class="my-auto">{{ $songtitle }}</p>
                        <p class="my-auto">{{ gmdate('i:s', $track->duration) }}</p>
                        <div class="cart-button" wire:click="addToCartFav({{ $track->id }})"
                            style="background-image:url('assets/images/cart.png'); width:20px; height:20px;background-size:contain; transition:all 0.3s ease">
                        </div>
                        <img src="{{ asset('assets/images/favorite_filled.png') }}" alt="" width="24"
                            height="24" wire:click="removeFavorite({{ $track->id }})" class="favorite">
                        <a href="{{ asset('storage/tracks/' . $track->file) }}" target="blank"><img src="{{ asset('assets/images/download.png') }}" style="width:24px"></a>
                    </div>
                </div>
                {{-- <div class="track d-flex justify-content-between align-items-center play-button"
                    data-url="{{ asset('storage/tracks/' . $track->file) }}" data-title = "{{ $songtitle }}"
                    data-track-id="{{ $track->id }}" data-track-play-image="{{ asset('assets/images/play.png') }}"
                    data-track-pause-image="{{ asset('assets/images/pause-outlined.png') }}">
                    <div class="playiccust" id="play_image{{ $track->id }}"></div>
                    <p class="my-auto">
                        {{ $songtitle }}
                    </p>
                    <p class="my-auto">
                        {{ gmdate('i:s', $track->duration) }}
                    </p>
                    <p class="my-auto price-p text-end">
                        {{ $track->price }} ₽
                    </p>
                    <div>
                        @auth
                            @if ($track->isFav)
                                <img src="{{ asset('assets/images/favorite_filled.png') }}" alt="" width="20"
                                    wire:click="removeFavorite({{ $track->id }})" height="20"
                                    class="favorite fav-button">
                            @else
                                <img src="{{ asset('assets/images/heart.png') }}" alt="" width="20"
                                    wire:click="addToFavorite({{ $track->id }})" height="20"
                                    class="favorite fav-button">
                            @endif

                        @endauth
                        <img src="{{ asset('assets/images/cart.png') }}" alt="" width="20"
                            wire:click="addToCartCatalog({{ $track->id }})" class="cart-button" height="20">
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
</div>
