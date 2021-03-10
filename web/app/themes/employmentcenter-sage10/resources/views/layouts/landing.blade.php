{{-- @include('partials.header') --}}

<div class="max-w-screen-xl mx-auto">
  <main class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif
</div>

@include('partials.footer')
