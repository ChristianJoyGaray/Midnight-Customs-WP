<?php


//Load stylesheet
function load_css(){


    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 
    false, 'all' );
    wp_enqueue_style('bootstrap');

    wp_register_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css', array(), 
    false, 'all' );
    wp_enqueue_style('magnific');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), 
    false, 'all' );
    wp_enqueue_style('main');
    
}

add_action('wp_enqueue_scripts','load_css');


//Load javaScript
function load_js(){


    wp_enqueue_script('jquery');

    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 
    'jquery', false, true);
    wp_enqueue_script('bootstrap');

    // wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', 
    // 'jquery', false, true);
    // wp_enqueue_script('bootstrap');
    //USE THIS WHEN YOU WANT TO ENABLE THE BOOTSTRAP NAVBAR



    wp_register_script('magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', 
    'jquery', false, true);
    wp_enqueue_script('magnific');


    wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 
    'jquery', false, true);
    wp_enqueue_script('custom');


}

add_action('wp_enqueue_scripts', 'load_js');





// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');





// Menus
register_nav_menus(

    array(

        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )


);



// Custom image sizes

function mytheme_custom_image_sizes() {
    add_image_size('blog-large', 800, 400, true);
    add_image_size('blog-small', 300, 200, true);
}
add_action('after_setup_theme', 'mytheme_custom_image_sizes');


// Register Sidebars
function my_sidebars(){

    register_sidebar(

        array(

            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_widget' => '<div class="widget-item" style="color:#111">',
            'after_widget' => '</div>'

        )

        );

        
    register_sidebar(

        array(

            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_widget' => '<div class="widget-item" style="color:#111">',
            'after_widget' => '</div>'

        )

        );


}
add_action('widgets_init','my_sidebars');






function my_first_post_type(){


        $args = array(


                'labels' => array(
                    
                    'name'=> 'Cars',
                    'singular_name' => 'Car'
                ),

                'hierarchical' => true,
                'public' => true,
                'has_archive' => true,
                'menu_icon' => 'dashicons-car', //search wordpress dashicons for the icon and copy the name
                'supports' => array('title','editor','thumbnail','custom-fields'),
                // automatic uses cars in URL'rewrite' => array('slug' => 'cars'),

                );

        register_post_type('cars', $args);


}
add_action('init','my_first_post_type');



function my_first_taxonomy(){


        $args = array(

            'labels' => array(
                'name' => 'Brands',
                'singular_name' => 'Brand',

            ),

            'public' => true,
            'hierarchical' => true,


        );

        register_taxonomy('brands', array('cars'), $args);




}
add_action('init','my_first_taxonomy');





// Allow JSON file uploads
function allow_json_uploads($mime_types) {
    $mime_types['json'] = 'application/json';
    return $mime_types;
}
add_filter('upload_mimes', 'allow_json_uploads');

 
require get_template_directory() . "/includes/advanced-custom-field/modifications.php";


 
require get_template_directory() . "/includes/blocks.php";



add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
function enquiry_form()
{


	if(  !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )  )
	{

		wp_send_json_error('Nonce is incorrect', 401);
		die();

	}



	$formdata = [];

	wp_parse_str($_POST['enquiry'], $formdata);


	// Admin email
	$admin_email = get_option('admin_email');


	// Email headers
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: My Website <' . $admin_email . '>';
	$headers[] = 'Reply-to:' . $formdata['email'];

	// Who are we sending the email to?
	$send_to = $admin_email;

	// Subject
	$subject = "Enquiry from " . $formdata['fname'] . ' ' . $formdata['lname']; 

	// Message
	$message = '';

	foreach($formdata as $index => $field)
	{
		$message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
	}


	try {

		if( wp_mail($send_to, $subject, $message, $headers) )
		{

			wp_send_json_success('Email sent');

		}
		else {


			wp_send_json_error('Email error');

		}

	} catch (Exception $e)
	{
			wp_send_json_error($e->getMessage());
	}


	wp_send_json_success( $formdata['fname'] );
}





/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

add_action('phpmailer_init', 'custom_mailer');
function custom_mailer(\PHPMailer\PHPMailer\PHPMailer $phpmailer) {
    $phpmailer->isSMTP();  // Set mailer to use SMTP
    $phpmailer->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $phpmailer->Port = 587;  // TCP port to connect to
    $phpmailer->SMTPAuth = true;  // Enable SMTP authentication
    $phpmailer->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
    $phpmailer->Username = SMTP_LOGIN;  // SMTP username
    $phpmailer->Password = SMTP_PASSWORD;  // SMTP password
    $phpmailer->setFrom('christianjoygaray123@gmail.com', 'Christian Garay');  // Sender info
}
//OR JUST USE PLUGIN: WP MAIL SMTP PLUGIN



function my_shortcode($atts, $content = null, $tag = ''){
    
    ob_start();

    set_query_var('attributes', $atts);

    get_template_part('includes/latest','cars');

    return ob_get_clean(); //no more echoing the upper line of code


}
add_shortcode('latest_cars','my_shortcode');



function search_query(){


    $paged = (get_query_var('paged')  ) ? get_query_var('paged') : 1;
    
    $args = [

        'paged' => $paged,
        'post_type' => 'cars',
        'posts_per_page' => 0, //0 is unlimited, give it a number for next post/page
        'tax_query' => [],
        'meta_query' => [

            'relation' => 'AND',

        ],

    ];

    if(isset($_GET['keyword'])){

        if( !empty( $_GET['keyword'] ) ){
            $args['s'] = sanitize_text_field( $_GET['keyword'] ); 
        }

    }


    if(isset($_GET['brand'])){

        if(!empty($_GET['brand'])){
            $args['tax_query'][] = [

                'taxonomy' => 'brands',
                'field' => 'slug',
                'terms' => array( $_GET['brand'])

            ]; 
        }

    }




    if(isset($_GET['price_above'])){

        if(!empty($_GET['price_above'])){

            $args['meta_query'][] = array(

                'key' => 'price',
                'value' => sanitize_text_field($_GET['price_above']),
                'compare' => '>=',
                'type' => 'numeric'

            );

        }

    }




    if(isset($_GET['price_below'])){

        if(!empty($_GET['price_below'])){

            
            $args['meta_query'][] = array(

                'key' => 'price',
                'value' => sanitize_text_field($_GET['price_below']),
                'compare' => '<=',
                'type' => 'numeric'

            );



        }

    }
    return new WP_Query($args);
}