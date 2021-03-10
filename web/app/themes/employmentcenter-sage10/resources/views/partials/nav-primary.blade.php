@if ($primary_navigation)
<div x-data="{ @foreach($primary_navigation as $menu_item) @if($menu_item->children) {{ str_replace(" ", "", strtolower($menu_item->label)) }}Menu: false,@endif @endforeach mobileMenuOpen: false }" class="z-40 relative bg-green-500">
  <div class="relative z-40">
    <div class="max-w-screen-lg mx-auto flex">
      <div class="-mr-2 -my-2 md:hidden relative z-40">
        <button @click="mobileMenuOpen = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white focus:outline-none transition duration-150 ease-in-out py-4 w-full">
          <svg class="h-6 w-6" x-description="Heroicon name: menu" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg> Menu
        </button>
      </div>
      <div class="hidden md:flex space-x-10">
        <div class="flex w-full justify-between">
          @foreach($primary_navigation as $menu_item)
          {{-- @dd($menu_item) --}}
            @if($menu_item->children)
              @include('partials.nav-dropdown', [ 'menuItem' => $menu_item ])
            @else
              <a href="{{ $menu_item->url }}" class="py-4 px-6 text-base leading-6 font-medium text-white focus:outline-none transition ease-in-out duration-150 hover:bg-gray-700" {{ $menu_item->target == true ? "target=\"blank\"" : "" }}>
               {{ $menu_item->label }}
             </a>
           @endif
         @endforeach
       </div>
     </div>
   </div>
 </div>


@include('partials.nav-mobile', ['mobileContent'=> $primary_navigation])

</div>

@endif
