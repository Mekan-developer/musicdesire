@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="d-flex justify-content-between" style="margin-top:20px">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <button rel="prev" disabled
                class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                style="border:none !important; background-color:transparent !important">
                <i class="fa-regular fa-arrow-left-long" style="color: transparent"></i>
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                style="border:none !important; background-color:transparent !important">
                <i class="fa-regular fa-arrow-left-long"></i>
            </a>
        @endif

        <div class="d-flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="btn btn-secondary disabled" aria-disabled="true">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="w-10 text-center rounded text-white cursor-pointer"
                                style="background-color:#ff918f; width:30px; height:30px; font-size:13px; padding-top:5px; margin-left:5px; margin-right: 0 !important">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="w-10 text-center rounded cursor-pointer"
                                style="width:30px; height:30px; font-size:13px; padding-top:5px; margin-left:5px; margin-right: 0 !important">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                style="border:none !important; background-color:transparent !important">
                <i class="fa-regular fa-arrow-right-long"></i>
            </a>
        @else
            <button disabled
                class="position-relative d-inline-flex align-items-center px-4 py-2 text-sm font-medium text-gray-700 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"
                style="border:none !important; background-color:transparent !important">
                <i class="fa-regular fa-arrow-right-long" style="color: transparent"></i>
            </button>
        @endif
    </nav>
@endif
