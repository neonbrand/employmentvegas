<header class="banner">
  <div class="max-w-screen-lg mx-auto text-black flex justify-center md:justify-between py-4 grid md:grid-cols-6">

    <a class="brand md:col-span-4" href="{{ home_url('/') }}">
      {!! wp_get_attachment_image( $siteLogo, array(400,100), "", array('class'=>'logo object-scale-down py-2')) !!}
    </a>
    <div class="flex md:col-span-2 justify-center md:justify-end py-2">
      <div class="ml-2">
        <a href="{{ get_permalink( '31' ) }}" class="bg-secondary-500 inline-flex items-center p-4 h-10 w-auto text-white"><?php _e('Attend a Meeting', 'sage'); ?></a>
      </div>
{{--       <div class="ml-2">
        <a href="https://www.facebook.com/centrohispanolv/" target="blank">@svg('images.facebook')</a>
      </div> --}}
    </div>
  </div>
  <div class="bg-primary-500 text-white">
    <div class="max-w-screen-lg mx-auto flex">
      <nav class="nav-primary w-full">
        @include('partials.nav-primary')
      </nav>
    </div>
  </div>
</header>
