<div>
    @section('title')
        Каталог треков
    @endsection
    @php
        $ru = app()->getLocale() == 'ru';
    @endphp
    <div class="catalog-container">
        <div class="row">
            <div class="col-lg-12">
                <div class=" playlist ">
                    <div class="tracks  col-lg-8 col-md-12 col-sm-12">
                        <div class="dropdown text-end" style="margin-bottom:20px">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $page_limit }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" wire:click="setPageLimits(6)">6</a></li>
                                <li><a class="dropdown-item" wire:click="setPageLimits(14)">14</a></li>
                                <li><a class="dropdown-item" wire:click="setPageLimits(50)">50</a></li>
                            </ul>
                        </div>
                        @forelse ($tracks as $track)
                            @php
                                $songtitle = '';
                                $songprice = '';
                                if ($ru) {
                                    $songtitle = $track->name_ru;
                                    $songprice = $track->price . ' ₽';
                                } else {
                                    $songtitle = $track->name_en;
                                    $songprice = '$' . $track->price_usd;
                                }
                            @endphp
                            <div class="track d-flex justify-content-between align-items-center play-button"
                                data-url="{{ asset('storage/tracks/' . $track->file) }}"
                                data-title = "{{ $songtitle }}" data-track-id="{{ $track->id }}"
                                data-track-play-image="{{ asset('assets/images/play.png') }}"
                                data-track-pause-image="{{ asset('assets/images/pause-outlined.png') }}">
                                <div class="playiccust" id="play_image{{ $track->id }}"></div>
                                <p class="my-auto text-center"
                                    style="width:35%; overflow-x: hidden;
                                white-space: nowrap;
                                text-overflow: ellipsis;">
                                    {{ $songtitle }}
                                </p>
                                <p class="my-auto text-center" style="width:20%">
                                    {{-- 3:12 --}}
                                    {{ gmdate('i:s', $track->duration) }}
                                </p>
                                <p class="my-auto price-p text-center" style="width:20%">
                                    {{ $songprice }}
                                </p>
                                <div class="d-flex">
                                    @auth
                                        @if ($track->isFav)
                                            <div class="favorite" wire:click="removeFavorite({{ $track->id }})"
                                                style="background-image:url('assets/images/favorite_filled.png'); width:20px; height:20px;background-size:contain">
                                            </div>
                                        @else
                                            <div class="favorite fav-button"
                                                wire:click="addToFavorite({{ $track->id }})"
                                                style="background-image:url('assets/images/heart.png'); width:20px; height:20px;background-size:contain">
                                            </div>
                                        @endif

                                    @endauth
                                    <div class="cart-button" wire:click="addToCartCatalog({{ $track->id }})"
                                        style="background-image:url('assets/images/cart.png'); width:20px; height:20px;background-size:contain; transition:all 0.3s ease">
                                    </div>
                                </div>
                            </div>

                        @empty
                            <p>{{ __('common.not_found') }}</p>
                        @endforelse
                        @if (count($tracks) > 1)
                            {{ $tracks->links('livewire.pagination-links') }}
                        @endif
                    </div>
                    <div class="filter col-lg-4 col-md-12 col-sm-12">
                        <div class="accordion" id="filterAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filterCategoryTrack">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseCategory" aria-expanded="true"
                                        aria-controls="collapseCategory">
                                        {{ __('common.genre') }}
                                    </button>
                                </h2>
                                <div id="collapseCategory" class="accordion-collapse collapse show"
                                    aria-labelledby="filterCategoryTrack">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            @foreach ($categories as $category)
                                                @php
                                                    $categoryTitle = '';
                                                    if ($ru) {
                                                        $categoryTitle = $category->name_ru;
                                                    } else {
                                                        $categoryTitle = $category->name_en;
                                                    }
                                                @endphp
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="category{{ $category->id }}"
                                                            value="{{ $category->id }}"
                                                            wire:model="selectedCategories" wire:click="resetPage()">
                                                        <label class="form-check-label"
                                                            for="category{{ $category->id }}">{{ $categoryTitle }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filterLanguageTrack">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collpaseLanguage" aria-expanded="true"
                                        aria-controls="collpaseLanguage">
                                        {{ __('common.lang') }}
                                    </button>
                                </h2>
                                <div id="collpaseLanguage" class="accordion-collapse collapse show"
                                    aria-labelledby="filterLanguageTrack">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            @foreach ($trackLangs as $lang)
                                                @php
                                                    $languageTitle = '';
                                                    if ($ru) {
                                                        $languageTitle = $lang->name_ru;
                                                    } else {
                                                        $languageTitle = $lang->name_en;
                                                    }
                                                @endphp
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="lang{{ $lang->id }}" value="{{ $lang->id }}"
                                                            wire:model = "selectedLangs"  wire:click="resetPage()">
                                                        <label class="form-check-label"
                                                            for="lang{{ $lang->id }}">{{ $languageTitle }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filterLanguageTrack">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collpaseDuration" aria-expanded="true"
                                        aria-controls="collpaseDuration">
                                        {{ __('common.dur') }}
                                    </button>
                                </h2>
                                <div id="collpaseDuration" class="accordion-collapse collapse show"
                                    aria-labelledby="filterLanguageTrack">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            @foreach ($trackDurs as $dur)
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="lang{{ $dur->id }}" value="{{ $dur->id }}"
                                                            wire:model = "selectedDurs"  wire:click="resetPage()">
                                                        <label class="form-check-label"
                                                            for="dur{{ $dur->id }}">{{ $dur->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filterTrackTempo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collpaseTempo" aria-expanded="true"
                                        aria-controls="collpaseTempo">
                                        {{ __('common.Tempo') }}
                                    </button>
                                </h2>
                                <div id="collpaseTempo" class="accordion-collapse collapse show"
                                    aria-labelledby="filterTrackTempo">
                                    <div class="accordion-body">
                                        <div class="row option-body">
                                            @foreach ($trackTempos as $tempo)
                                                <div class="col-sm-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="tempo{{ $tempo->id }}" value="{{ $tempo->id }}"
                                                            wire:model = "selectedTempos"  wire:click="resetPage()">
                                                        <label class="form-check-label"
                                                            for="tempo{{ $tempo->id }}">{{ __('common.' . $tempo->name) }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="accordion-item">
                                <h2 class="accordion-header" id="filtersWords">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseWords" aria-expanded="true"
                                        aria-controls="collapseWords">
                                        {{ __('common.words_in_track') }}
                                    </button>
                                </h2>
                                <div id="collapseWords" class="accordion-collapse collapse show"
                                    aria-labelledby="filtersWords">
                                    <div class="accordion-body">
                                        <div class="row option-body">

                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="lyrics"
                                                        id="lyricsYes" wire:model = "selectedLyrics" value="1"  wire:click="resetPage()">
                                                    <label class="form-check-label"
                                                        for="lyricsYes">{{ __('common.is') }}</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="lyrics"
                                                        id="lyricsNo" wire:model = "selectedLyrics" value="0"  wire:click="resetPage()">
                                                    <label class="form-check-label"
                                                        for="lyricsNo">{{ __('common.isnt') }}</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.player')
        </div>
    </div>

    @section('page-script2')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log(@this.locset + 'q');
                if (!@this.locset) {
                    showLocationModal();
                }

            });
        </script>
    @endsection
</div>
