<?php
/*
  @package verso-lite
*/
?>
<form role="search" id="searchform" class="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <div class="input-group">

    <input type="text" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'verso-lite' ); ?>" value="<?php echo the_search_query(); ?>" name="s" id="search" title="Search" />

    <span class="input-group-btn">
        <button type="submit" name="submit" id="searchsubmit" class="submit btn btn-primary" value="<?php esc_attr_e( 'Search', 'verso-lite' ); ?>"><i class="icon-search"></i></button>
    </span>
  </div>

</form>
