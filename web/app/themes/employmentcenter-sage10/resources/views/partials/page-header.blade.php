@php
$blocks = parse_blocks( $post->post_content );
@endphp
@if($blocks[0]['blockName'] != 'core/cover' && !has_shortcode(get_the_content(), 'smartslider3') && !get_field('hide_title'))
<div class="page-header text-center py-6">
  <h1>{!! $title !!}</h1>
</div>
@endif
