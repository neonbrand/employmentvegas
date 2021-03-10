<div class="relative">
    <button type="button" @click="{{ str_replace(" ", "", strtolower($menuItem->label)) }}Menu = !{{ str_replace(" ", "", strtolower($menuItem->label)) }}Menu;" x-state:on="Item active" x-state:off="Item inactive" :class="{ 'bg-gray-800': {{ str_replace(" ", "", strtolower($menuItem->label)) }}Menu }" class="py-4 px-6 group inline-flex items-center space-x-2 text-base leading-6 font-medium hover:bg-gray-700 focus:outline-none transition ease-in-out duration-150 text-white">
        <span>{{ $menuItem->label }}</span>
        <svg x-state:on="Item active" x-state:off="Item inactive" class="h-5 w-5 transition ease-in-out duration-150 text-white" x-bind:class="{ 'text-white': {{ str_replace(" ", "", strtolower($menuItem->label)) }}Menu, 'text-white': !{{ str_replace(" ", "", strtolower($menuItem->label)) }}Menu }" x-description="Heroicon name: chevron-down" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
    @include('partials.nav-dropdown-content', ['dropContent'=> $menu_item ])
</div>
