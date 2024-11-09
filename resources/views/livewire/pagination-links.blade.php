<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-center" style="margin-top:20px">
            
            {{-- Пагинация для десктопной версии --}}
            <div class="d-none d-md-flex">
                {{-- Previous Page Link --}}
                <span>
                    @if ($paginator->onFirstPage())
                        <button rel="prev" disabled
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-left-long" style="color: transparent"></i>
                        </button>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-left-long"></i>
                        </button>
                    @endif
                </span>

                {{-- Номера страниц --}}
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <p class="w-10 text-center rounded text-white cursor-pointer"
                                    wire:click="gotoPage({{ $page }})"
                                    style="background-color:#ff918f; width:30px; height:30px; font-size:13px; padding-top:5px;margin-left:5px;cursor:pointer">
                                    {{ $page }}</p>
                            @else
                                <p class="w-10 text-center rounded cursor-pointer"
                                    wire:click="gotoPage({{ $page }})"
                                    style="width:30px; height:30px; font-size:13px;padding-top:5px;margin-left:5px; cursor:pointer">
                                    {{ $page }}</p>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                <span>
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-right-long"></i>
                        </button>
                    @else
                        <button disabled
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-right-long" style="color: transparent"></i>
                        </button>
                    @endif
                </span>
            </div>

            {{-- Пагинация для мобильной версии --}}
            <div class="d-flex d-md-none">
                {{-- Previous Page Link --}}
                <span>
                    @if ($paginator->onFirstPage())
                        <button rel="prev" disabled
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-left-long" style="color: transparent"></i>
                        </button>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev"
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-left-long"></i>
                        </button>
                    @endif
                </span>

                {{-- Номера страниц (от 1 до 7, затем последние страницы) --}}
                @foreach ($elements as $element)
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page <= 5 || $page == $paginator->lastPage())
                                <p class="w-10 text-center rounded cursor-pointer {{ $page == $paginator->currentPage() ? 'text-white' : '' }}"
                                    wire:click="gotoPage({{ $page }})"
                                    style="background-color: {{ $page == $paginator->currentPage() ? '#ff918f' : 'transparent' }}; width:30px; height:30px; font-size:13px; padding-top:5px;margin-left:5px;cursor:pointer">
                                    {{ $page }}</p>
                            @elseif ($page == 6)
                                <p class="w-10 text-center rounded cursor-pointer"
                                    style="width:30px; height:30px; font-size:13px;padding-top:5px;margin-left:5px;">...</p>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                <span>
                    @if ($paginator->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next"
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-right-long" style="color: black"></i>
                        </button>
                    @else
                        <button disabled
                            class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700  leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                            style="border:none !important; background-color:transparent !important">
                            <i class=" fa-regular fa-arrow-right-long" style="color: black"></i>
                        </button>
                    @endif
                </span>
            </div>
        </nav>
    @endif
</div>
