<div class="relative z-40">
  <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="mobileMenuOpen" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute top-10 inset-x-0 p-2 transition transform origin-top-right md:hidden">
    <div class="rounded-lg shadow-lg">
      <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
        <div class="py-3 px-3 space-y-6 sm:space-y-8 sm:pb-8">
          <div class="flex items-center justify-between">
            <div class="-mr-2">
              <button @click="mobileMenuOpen = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" x-description="Heroicon name: x" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="py-3 px-5 space-y-6">
          <nav class="grid gap-y-4">

            @foreach($mobileContent as $menu_item)
            @if($menu_item->children)
            @include('partials.nav-mobile-children', [ 'dropContent' => $menu_item ])
            @else
            <a href="{{ $menu_item->url }}" class="p-3 flex items-center space-x-3 rounded-md hover:bg-gray-50 transition ease-in-out duration-150 {{ $menu_item->classes }}">
              <div class="text-base leading-6 font-medium text-gray-900">
                {{ $menu_item->label }}
              </div>
            </a>
            @endif
            @endforeach
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
