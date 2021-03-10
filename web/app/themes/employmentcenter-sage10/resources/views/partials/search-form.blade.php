<form role="search" method="get" id="search-form" class="bg-white max-w-3xl p-2 mx-auto flex border border-gray-300 h-16" action="<?php echo esc_url( home_url(  ) ); ?>">
        <input type="search" data-swplive="true" class="border-0 w-4/5" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
        <button form="search-form" class="bg-green-500 border-0 rounded-none leading-3 py-2" type="submit">
            <span class="hidden md:inline-block"><?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?></span>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
        </button>
        <input type="hidden" name="post_type" value="product" />
</form>
