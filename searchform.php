<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-label" for="search"></label>
		<input placeholder="Search..." type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s"  />
    <button type="submit" class="search-submit">
        <img src="http://localhost:8888/woocommerce-tutorial/wp-content/uploads/2021/06/Search-icon.svg" alt="">
    </button> 
    <input type="hidden" value="product" name="post_type" id="post_type">
</form>
