{{-- @dd($dropContent) --}}
<div x-description="'More' flyout menu, show/hide based on flyout menu state." x-show="{{ str_replace(" ", "", strtolower($dropContent->label)) }}Menu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-1" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0 z-40">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="relative grid gap-6 bg-white px-5 py-2 sm:gap-8 sm:p-8">
            @foreach($dropContent->children as $child)
            <a href="{{ $child->url }}" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-200" {{ $child->target == true ? "target=\"blank\"" : "" }}>
                {{-- <svg class="flex-shrink-0 h-6 w-6 text-indigo-600" x-description="Heroicon name: support" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg> --}}
                <div class="">
                    <span class="block text-base font-medium text-gray-900 pb-0">
                        {{ $child->label }}
                    </span>
                    {{-- <p class="mt-1 text-sm text-gray-500">
                        Get all of your questions answered in our forums or contact support.
                    </p> --}}
                </div>
            </a>
            @endforeach

        </div>
    </div>
</div>




{{--< div x-description="'More' flyout menu, show/hide based on flyout menu state." x-show="{{ str_replace(" ", "", strtolower($dropContent->label)) }}Menu" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1" class="hidden md:block z-100 absolute inset-x-0 transform shadow-lg" style="display: none;">
    <div class="absolute inset-0 flex">
        <div class="bg-white w-1/2"></div>
        <div class="bg-white w-1/2"></div>
    </div>
    <div class="relative max-w-7xl mx-auto grid grid-cols-1 px-16 lg:gap-4 lg:grid-cols-5">
        @foreach($dropContent->children as $child)
        @if($child->children)
        <nav class="py-8 bg-white sm:py-12 xl:pr-8">
            <div class="space-y-5">
                <div class="h3 text-sm leading-5 font-medium tracking-wide text-gray-500 uppercase">
                    {{ $child->label }}
                </div>
                <ul class="space-y-6">
                    @foreach($child->children as $listItem)
                    <li class="flow-root">
                        <a href="{{ $listItem->url }}" class="-m-3 p-3 flex items-center space-x-4 rounded-md text-base leading-6 font-medium text-gray-900 hover:bg-gray-50 transition ease-in-out duration-150">
                            <span>{{ $listItem->label }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
        @else
        <div class="py-8 bg-white sm:py-12 xl:pr-8">
            <div class="space-y-6">
                <a href="{{ $child->url }}" class="-m-3 p-3 flex items-center space-x-4 rounded-md text-base leading-6 font-medium text-gray-900 hover:bg-gray-50 transition ease-in-out duration-150">
                    <span>{{ $child->label }}</span>
                </a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
--}}
