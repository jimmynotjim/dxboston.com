<form method="get" id="searchform" class="single-input-form site-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search" onsubmit="validateSearch()">
  <div class="search-field">
    <label for="s" class="assistive-text <?php if( is_search() ) { echo 'focused'; } ?>"><?php _e( 'Search the site' ); ?></label>
    <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="Enter your search terms" />
  </div>
  <button type="submit" class="btn solid" name="submit" id="searchsubmit"><?php esc_attr_e( 'Search' ); ?></button>
</form>
