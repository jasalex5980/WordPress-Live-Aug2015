<?php


function custom_theme_setup() {
	add_theme_support( 'post-thumbnails' ); 
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
/*---------------------

	::  Register Menus
	
---------------------*/	
function register_my_menus() {
  register_nav_menus(
    array(
      'main-nav' => __( 'Main Menu' ),
      'utility-nav' => __( 'Utility Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


/*---------------------

	::  Register Sidebars
	
---------------------*/	
	function register_my_sidebars() {

	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'description' => 'Default sidebar on interior pages',
		'before_widget' => '<div class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
}
add_action( 'widgets_init', 'register_my_sidebars' );
	


function cd_enque_script() {
	wp_deregister_script( 'jquery' );  
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');  
	wp_enqueue_script('jquery');  
	wp_enqueue_script( 'my-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'', true );
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true );
}

add_action( 'wp_enqueue_scripts', 'cd_enque_script' );  

/*---------------
    	::CUSTOM METABOXES::
    ----------------*/
add_filter( 'cmb_meta_boxes', 'cmb_jazmine_metaboxes' );

function cmb_jazmine_metaboxes( array $meta_boxes ) {

//global setup
$prefix = '_cmb_';
$meta_boxes = array();

	//Header meta boxes
	$meta_boxes['header_content'] = array(
		'id' => 'header_content',
		'title' => 'Header Content',
		'pages' => array('page'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
		 
			//Title
			array(
				'name'    => __( 'Page Title', 'cmb' ),
				'title' => 'Title','desc' => 'Enter Title',
				'id' => $prefix . 'header_title',
				'type' => 'textarea_small',
			),
				
			//Description
			array(
				'name'    => __( 'Description', 'cmb' ),
				'desc'    => __( 'Paragraph below title', 'cmb' ),
				'id'      => $prefix . 'header_desc',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			//Header Height
			array(
				'name'    => __( 'Header height', 'cmb' ),
				'desc'    => __( 'Height of header in pixels', 'cmb' ),
				'id'      => $prefix . 'header_height',
				'type'    => 'text',
			),
			//Header Image
			array(
				'name' => __( 'Header Image', 'cmb' ),
				'desc' => __( 'Upload a header image', 'cmb' ),
				'id'   => $prefix . 'header_image',
				'type' => 'file',
			),
		),
	);
	
//Testimonial meta boxes
	$meta_boxes['testimonial_content'] = array(
		'id' => 'testimonial_content',
		'title' => 'Testimonial',
		'pages' => array('page'),
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true,
		'fields' => array(
		 
			//Author
			array(
				'name'    => __( 'Testimonial Author', 'cmb' ),
				'title' => 'Title','desc' => 'Enter author name',
				'id' => $prefix . 'testimonial_author',
				'type' => 'text',
			),
				
			//Quote
			array(
				'name'    => __( 'Quote', 'cmb' ),
				'desc'    => __( 'Enter the quote not including quotation marks', 'cmb' ),
				'id'      => $prefix . 'testimonial_quote',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			//Testimonial Background Color
			array(
				'name'    => __( 'Background Color', 'cmb' ),
				'desc'    => __( 'background color of this testimonial area (default is turquoise)', 'cmb' ),
				'id'      => $prefix . 'testimonial_bg',
				'type'    => 'colorpicker',
				'default' => '#008aad'
			),
		),
	);

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';

}

add_action( 'woocommerce_before_customer_login_form', 'jazmine_login_message' );
function jazmine_login_message() {?>
<div class="login-wrap"><h2>Welcome Back.</h2><p>Please enter your username and password to access your account. Remember to store your login information in a safe place and only share with people on a need-to-know basis. On our end, you can trust Jazmine to always keep your information safe and sound.</p>
	<?php } 
    
add_action( 'woocommerce_after_customer_login_form', 'jazmine_login_footer' );
function jazmine_login_footer() {?>
<div class="login-footer"><a href="/pricing/">Register</a> <a href="/my-account/lost-password/">Lost Password</a></div></div>
	<?php } 
	
 /*---------------
    	::ADD CUSTOM FIELD TO CHECKOUT::
    ----------------*/   
/**
* Add the field to the checkout
*/
add_action( 'woocommerce_after_checkout_registration_form', 'my_custom_checkout_field' );
 
function my_custom_checkout_field( $checkout ) {
 
echo '<div id="my_custom_checkout_field well">';
 
woocommerce_form_field( 'custom_field_pin', array(
'type' => 'text',
'class' => array('form-row form-row-wide validate-required'),
'label' => __('Pin <abbr title="required" class="required">*</abbr>'),
'placeholder' => __('Enter a PIN'),
), $checkout->get_value( 'custom_field_pin' ));
 
echo '<p>Your personalized PIN provides extra security for various features.
Please choose a number of at least 4 digits.</p></div>';
 
} 
/**
 * Process the checkout
 */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['custom_field_pin'] )
        wc_add_notice( __( '<strong>PIN</strong> is a required field.' ), 'error' );
}
/**
* Update the order meta with field value
*/
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );
 
function my_custom_checkout_field_update_order_meta( $order_id ) {
if ( ! empty( $_POST['custom_field_pin'] ) ) {
update_post_meta( $order_id, 'PIN', sanitize_text_field( $_POST['custom_field_pin'] ) );
}
} 

 /*---------------
    	::ADD CLASS TO PASSWORD FIELD::
    ----------------*/   
	
// Hook in
// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
// function custom_override_checkout_fields( $fields ) {
//     $fields['account']['account_password']['class'] = 'test';
//     return $fields;
// }

/*---------------
    	::REDIRECT USER AFTER LOGIN::
    ----------------*/   

function wc_custom_user_redirect( $redirect, $user ) {
	// Get the first of all the roles assigned to the user
	$role = $user->roles[0];

	$dashboard = admin_url();
	$jumppage = '/jump-page/';

	if( $role == 'administrator' ) {
		//Redirect administrators to the dashboard
		$redirect = $dashboard;
	}  else {
		//Redirect any other role to the jump page
		$redirect = $jumppage;
	}

	return $redirect;
}
add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );