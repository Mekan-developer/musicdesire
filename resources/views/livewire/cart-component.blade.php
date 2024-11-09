<div class="d-flex">
    @php
        $ru = app()->getLocale() == 'ru';
    @endphp
    <div class="cart-comp">
        <a wire:click="showCart" id="trigger" class="text-uppercase mobile-none"><img
                src="{{ asset('assets/images/cart.png') }}" width="20">
            @if ($cart_count > 0)
                <div class="total-abs">{{ $cart_count }}</div>
            @endif
        </a>
        {{-- <a wire:click="showCart" id="trigger" class="mobile-menu-a text-uppercase">{{ __('common.cart') }} @if ($cart_count > 0)
                ({{ $cart_count }})
            @endif

        </a> --}}

        {{-- <div class="total-row flex-row justify-content-center" id="target" style="display: none">
            <div class="total">

                <p class="text-white">
                    @if ($cart_count == 0)
                        {{ __('common.no_tracks') }}
                    @else
                        ={{ __('common.total') }}: {{ $total }}₽
                    @endif
                </p>
            </div>
            <div
                @if ($cart_count == 0) class="d-none"
            @else
            class="total-quant" @endif>
                {{ $cart_count }}</div>
        </div> --}}
    </div>

    <div class="cart-comp">
        <a data-bs-toggle="modal" data-bs-target="#locationModal">
            @isset($user_location_id)
                <i class="fa-light fa-location-dot icon" id="regionTrigger"></i>
                {{-- <div class="total-row flex-row justify-content-center" id="region" style="display: none">
                    <div class="total">
                        @isset($user_location_title)
                            {{ $user_location_title }}
                        @else
                            {{ $user_location_id }}
                        @endisset   
                    </div>
                </div> --}}
            @else
                <i class="fa-light fa-location-dot icon"></i>
            @endisset
        </a>
    </div>

    <div class="modal fade right" wire:ignore.self id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="cartContent">
                <div class="modal-header">
                    <p class="request-modal-title text-uppercase">{{ __('common.your_order') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cart-tracks">
                        @forelse ($items as $item)
                            @php
                                $songtitle = '';
                                if ($ru) {
                                    $songtitle = $item->trackItem->name_ru;
                                } else {
                                    $songtitle = $item->trackItem->name_en;
                                }
                            @endphp
                            <div class="track d-flex justify-content-between align-items-center" {{-- data-url="{{ asset('storage/tracks/' . $item->file) }}"
                                data-title = "{{ $songtitle }}" data-track-id="{{ $item->id }}"
                                data-track-play-image="{{ asset('assets/images/play.png') }}"
                                data-track-pause-image="{{ asset('assets/images/pause-outlined.png') }}" --}}>
                                <div class="playiccust" id="play_image_cart{{ $item->id }}"
                                    onclick="playAudio('{{ asset('storage/tracks/' . $item->trackItem->file) }}', {{ $item->id }})">
                                </div>

                                <p class="my-auto">
                                    {{ $songtitle }}
                                </p>
                                <i class="fa-thin fa-xmark i my-auto" style="color: #282828"
                                    wire:click="removeFromCart({{ $item->trackItem->id }})"></i>
                            </div>
                        @empty
                            <label class="modal-p mt-4">{{ __('common.nothing_selected') }}</label>
                        @endforelse
                    </div>
                    <p class="mt-3 modal-p text-end">{{ __('common.total') }}: @if ($ru)
                            {{ $total }} ₽
                        @else
                            ${{ $total_usd }}
                        @endif
                    </p>
                    <form wire:submit.prevent="addOrder">

                        <div class="form-group mt-3">
                            <label for="order_name" class="modal-p">{{ __('common.your_name') }}</label>
                            <input type="text" class="form-control modal-input mb-35" id="order_name"
                                name="order_name" wire:model="order_name" placeholder="{{ __('common.your_name') }}">
                            @error('order_name')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="order_email" class="modal-p">Email</label>
                            <input type="text" class="form-control modal-input mb-35" id="order_email"
                                name="order_email" wire:model="order_email" placeholder="">
                            @error('order_email')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="order_phone" class="modal-p">{{ __('common.contact_you') }}</label>
                            <input type="text" class="form-control modal-input mb-35" id="order_phone"
                                name="order_phone" wire:model="order_phone" placeholder="+7999 111 2233">
                            @error('order_phone')
                                <span>{{ $message }}</span>
                            @enderror
                        </div>
                        <label class="modal-p d-flex"><i class="fa-thin fa-globe"
                                style="margin-top: 4px; margin-right:5px;"></i>
                            {{ __('common.region') }}

                        </label>
                        <div class="request-button" wire:click="showLocationModal" style="margin-top: 20px!important">
                            @if ($user_location)
                                @if ($ru)
                                    {{ $user_location->title }} {{ $user_location->subj }}
                                @else
                                    {{ $user_location->title_en }}
                                @endif
                            @else
                                {{ __('common.select_region') }}
                            @endif
                        </div>
                        <input type="hidden" name="order_location" id="order_location" wire:model="order_location" value="{{ session()->get('user_location_id') }}">
                        @error('order_location')
                            <span>{{ $message }}</span>
                        @enderror
                        {{-- <div class="form-group mt-3">
                            <select class="form-select modal-input mb-35" aria-label="Location select"
                                name="order_location" wire:model="order_location">
                                <option class="">{{ __('common.select_region') }}</option>
                                @foreach ($locationsTotal as $loc)
                                    <option value="{{ $loc->id }}">
                                        @if ($ru)
                                            {{ $loc->title }} {{ $loc->subj }}
                                        @else
                                            {{ $loc->title_en ?? $loc->title }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            @error('order_location')
                                <span>{{ $message }}</span>
                            @enderror
                        </div> --}}
                        <div class="form-group mt-3">
                            <p class="mb-2">{{ __('common.select_payment_method') }}:</p>

                            <div>
                            
                            <input type="radio" class="mb-35" id="payment1" name="order_payment" wire:model="order_payment" value="prodamus" selected checked>
                            <label for="payment1" class="modal-p">Банковская карта</label>
                            </div>

                            <div>
                            
                            <input type="radio" class="mb-35" id="payment2" name="order_payment" wire:model="order_payment"  value="paypal">
                            <label for="payment2" class="modal-p">Paypal</label>
                            </div>
                            @error('order_payment')
                                <span>{{ $message }}</span>
                            @enderror
                            
                        </div>
                        <button type="submit" class="request-modal-btn mb-35">
                            <p>{{ __('common.pay') }}</p>
                        </button>
                        <p class="acceptance">{{ __('common.agreement') }}<a
                                href="/privacy">{{ __('common.agreement_1') }}</a> </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade right" wire:ignore.self id="locationModal" tabindex="-1"
        aria-labelledby="locationModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header">
                    <p class="request-modal-title">{{ __('common.select_country') }}</p>
                    {{-- @isset($user_location_id) --}}
                    @if ( auth()->user() )
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    @endif
                    {{-- @endisset --}}
                </div>
                <div class="modal-body">
                    <input type="text" wire:model="searchLoc" placeholder="{{ __('common.search_region') }}"
                        class="mb-35 modal-input">
                    @php
                        $ru = app()->getLocale() == 'ru';
                    @endphp
                    @if ($searchLoc != '')
                        @forelse ($locations as $loc)
                            @if (count($loc->children) == 0)
                                <div class="track d-flex justify-content-between align-items-center"
                                    wire:click="setLocation({{ $loc->id }})">
                                    <p class="my-auto">
                                        @if ($ru)
                                            {{ $loc->title }} {{ $loc->subj }}
                                        @else
                                            {{ $loc->title_en ?? $loc->title }}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        @empty
                            {{ __('common.not_found_loc') }}
                        @endforelse
                    @else
                        @forelse ($locations as $loc)
                            @if (count($loc->children) != 0)
                                <a data-bs-toggle="collapse" href="#collapseLocation{{ $loc->id }}"
                                    role="button" aria-expanded="false"
                                    aria-controls="collapseLocation{{ $loc->id }}">
                                    <div class="track d-flex justify-content-between align-items-center">
                                        <p class="my-auto" style="font-size: 16px">
                                            @if ($ru)
                                                {{ $loc->title }} {{ $loc->subj }}
                                            @else
                                                {{ $loc->title_en }} {{ $loc->subj }}
                                            @endif
                                        </p>
                                    </div>
                                </a>

                                <div class="collapse" id="collapseLocation{{ $loc->id }}">
                                    <p class="my-auto" style="font-size: 16px">
                                        {{ __('common.select_region') }}
                                    </p>
                                    @foreach ($loc->children as $child)
                                        <div class="track d-flex justify-content-between align-items-center"
                                            wire:click="setLocation({{ $child->id }})">
                                            <p class="my-auto">
                                                • @if ($ru)
                                                    {{ $child->title }} {{ $child->subj }}
                                                @else
                                                    {{ $child->title_en ?? $child->title }}
                                                    {{ $child->title_en != '' ? '' : $child->subj }}
                                                @endif
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="track d-flex justify-content-between align-items-center"
                                    wire:click="setLocation({{ $loc->id }})">
                                    <p class="my-auto">
                                        @if ($ru)
                                            {{ $loc->title }} {{ $loc->subj }}
                                        @else
                                            {{ $loc->title_en ?? $loc->title }}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        @empty
                        @endforelse
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="cartAddedToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="fas fa-cart-plus" style="margin-right: 10px"></i>
                <strong class="me-auto">{{ __('common.cart') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div class="d-flex">
                    <p style="margin-right: 10px">{{ __('common.added') }}</p>
                    <a wire:click="showCart"
                        style="color:#ff7472 !important; font-size: 14px !important; padding: 0 !important">{{ __('common.see') }}</a>
                </div>

            </div>
        </div>
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="cartAlreadyToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fas fa-cart-plus" style="margin-right: 10px"></i>
                    <strong class="me-auto">{{ __('common.cart') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ __('common.already_added') }}
                </div>
            </div>
        </div>
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="orderAdded" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fas fa-cart-plus" style="margin-right: 10px"></i>
                    <strong class="me-auto">{{ __('common.your_order') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ __('common.created') }}
                </div>
            </div>
        </div>
    </div>
    @section('page-script3')
        <script>
            var currentAudio = null; // Текущий проигрывающийся объект Audio
            var currentTrackId = null; // ID текущего трека

            function playAudio(url, trackId) {
                // Если уже что-то проигрывается
                if (currentAudio) {
                    // Если это тот же трек, что и сейчас
                    if (currentTrackId === trackId) {
                        if (currentAudio.paused) {
                            currentAudio.play(); // Продолжить проигрывание
                            document.getElementById('play_image_cart' + trackId).style.backgroundImage =
                                "url('{{ asset('assets/images/pause-outlined.png') }}')";
                        } else {
                            currentAudio.pause(); // Пауза
                            document.getElementById('play_image_cart' + trackId).style.backgroundImage =
                                "url('{{ asset('assets/images/play.png') }}')";
                        }
                        return;
                    } else {
                        // Остановить текущий трек и изменить иконку на 'play'
                        currentAudio.pause();
                        document.getElementById('play_image_cart' + currentTrackId).style.backgroundImage =
                            "url('{{ asset('assets/images/play.png') }}')";
                    }
                }

                // Создать новый объект Audio и начать проигрывание нового трека
                currentAudio = new Audio(url);
                currentAudio.play();
                currentAudio.addEventListener('ended', function() {
                    document.getElementById('play_image_cart' + trackId).style.backgroundImage =
                        "url('{{ asset('assets/images/play.png') }}')"; // Вернуть иконку на 'play' после окончания трека
                });
                currentTrackId = trackId;
                document.getElementById('play_image_cart' + trackId).style.backgroundImage =
                    "url('{{ asset('assets/images/pause-outlined.png') }}')"; // Изменить иконку на 'pause'
            }

            // Добавить событие для остановки трека при его окончании
            if (currentAudio) {
                currentAudio.addEventListener('ended', function() {
                    currentAudio = null;
                    currentTrackId = null;
                    document.getElementById('play_image_cart' + trackId).className =
                        "url('{{ asset('assets/images/play.png') }}')";
                });
            }



            var options = {
                animation: true,
                delay: 3000
            };
            var toastElList = [].slice.call(document.querySelectorAll('.toast'))
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, options)
            })

            function showAddedToast() {
                var cartAddedToast = document.getElementById('cartAddedToast');
                var toast = new bootstrap.Toast(cartAddedToast);
                toast.show();
            }

            function showAlreadyToast() {
                var cartAlreadyToast = document.getElementById('cartAlreadyToast');
                var toast = new bootstrap.Toast(cartAlreadyToast);
                toast.show();
            }

            function showOrderAddedToast() {

                var orderAddedToast = document.getElementById('orderAdded');
                var toast = new bootstrap.Toast(orderAddedToast);
                toast.show();
            }

            function closeLocationModal() {
                var locationModal = document.getElementById('locationModal');
                var modalInstance = bootstrap.Modal.getInstance(locationModal);
                modalInstance.hide();
            }

            function showCartModal() {
                var cartModal = document.getElementById('cartModal');
                var modalInstance = bootstrap.Modal.getInstance(cartModal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    modalInstance = new bootstrap.Modal(cartModal);
                    modalInstance.show();
                }
            }

            function showLocationModal() {
                var locModal = document.getElementById('locationModal');
                var modalInstance = bootstrap.Modal.getInstance(locModal);
                if (modalInstance) {
                    modalInstance.show();
                } else {
                    modalInstance = new bootstrap.Modal(locModal);
                    modalInstance.show();
                }
            }

            function closeCartModal() {
                var cartModal = document.getElementById('cartModal');
                var modalInstance = bootstrap.Modal.getInstance(cartModal);
                modalInstance.hide();
            }


            document.addEventListener('DOMContentLoaded', function() {
                window.addEventListener('show-added-toast', event => {
                    showAddedToast();
                });
                window.addEventListener('show-already-toast', event => {
                    showAlreadyToast();
                });
                window.addEventListener('show-location-modal', event => {
                    showLocationModal();
                });
                window.addEventListener('close-location-modal', event => {
                    closeLocationModal();
                });
                window.addEventListener('show-cart-modal', event => {
                    showCartModal();
                });
                window.addEventListener('close-cart-modal', event => {
                    closeCartModal();
                });
                window.addEventListener('show-order-added-toast', event => {
                    showOrderAddedToast();
                });
            });
        </script>
    @endsection

</div>
