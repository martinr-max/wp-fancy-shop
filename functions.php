<?php
function fancy_shop_files() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ));
    wp_enqueue_style('fancy_shop_main_styles', get_stylesheet_uri());
  }
  
add_action('wp_enqueue_scripts', 'fancy_shop_files');

function fancy_shop_features() {
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('post-thumbnails');


    register_nav_menus(array(
        'fancy-shop-main-menu' => 'Fancy shop main menu',
        'fancy-shop-footer-menu' => 'Fancy shop footer menu',
    ));
    
}
  
add_action('after_setup_theme', 'fancy_shop_features');

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
  
    $filetype = wp_check_filetype( $filename, $mimes );
  
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );
  
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  
  function fix_svg() {
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
  }
  add_action( 'admin_head', 'fix_svg' );


function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}


	
add_action( 'woocommerce_after_shop_loop_item_title', 'shoptimizer_custom_author_field', 3 );
  
function shoptimizer_custom_author_field() { ?>
 
<?php if(get_field('artist')) { ?>
	<div class="cg-author"><?php the_field('artist'); ?></div>
<?php }
}

add_action( 'woocommerce_single_product_summary', 'shoptimizer_custom_author_field_2', 3 );
  
function shoptimizer_custom_author_field_2() { ?>
 
<?php if(get_field('artist')) { ?>
	<div class="cg-author"><?php the_field('artist'); ?></div>
<?php }
}

//CUSTOMIZE THE SINGLE PRODUCT DESCRIPTION TAB

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

add_filter('the_content','add_details_to_content', 10, 1);
function add_details_to_content($content){
    if ( is_product() ){
        global $product;
        $content = '<div class="product-description">'.$content.'</div>';

        ob_start();
        ?><div class="product-additional-info"><?php

        $heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );
        if ( !empty($heading) ) {
        ?>
            <h3><?php echo esc_html( $heading ); ?></h3>
        <?php }

        do_action( 'woocommerce_product_additional_information', $product );
        ?></div><?php
        $content .= ob_get_clean();
    }
    return $content;
}


// CUSTOMIZE THE SINGLE PRODUCT SUMMARY ORDER

add_action('get_header', 'remove_admin_login_header');

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );


//CUSTOM POST TYPES

function university_post_types() {
  
  register_post_type('offer', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'thumbnail'),
    'public' => true,
    'labels' => array(
      'name' => 'Offer',
      'add_new_item' => 'Add New Offer',
      'edit_item' => 'Edit Offer',
      'all_items' => 'All Offers',
      'singular_name' => 'Offer'
    ),
    'menu_icon' => 'dashicons-welcome-learn-more'
  ));

  
}

add_action('init', 'university_post_types');
