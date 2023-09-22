<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
    <div class="row">
        <div class="col-md-10">
            <label class="w-100">
                <span class="screen-reader-text"><?php _e('Search for:', 'textdomain'); ?></span>
                <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'textdomain'); ?>" value="<?php echo get_search_query(); ?>" name="s">
            </label>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary-dark w-100"><?php _e('Search', 'textdomain'); ?></button>
        </div>
    </div>
</form>
