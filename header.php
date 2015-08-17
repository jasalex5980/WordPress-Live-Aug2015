<?php // The Header for our theme ?>

<!doctype html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />


<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>

<!--<link rel="profile" href="http://gmpg.org/xfn/11" />-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/style.css"/>

<meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1.0, initial-scale=1" />

<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-57x57.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-60x60.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-72x72.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-76x76.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-114x114.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-120x120.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-144x144.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-152x152.png?v=oLj4pxvJlO">
<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/apple-touch-icon-180x180.png?v=oLj4pxvJlO">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/favicon-32x32.png?v=oLj4pxvJlO" sizes="32x32">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/favicon-194x194.png?v=oLj4pxvJlO" sizes="194x194">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/favicon-96x96.png?v=oLj4pxvJlO" sizes="96x96">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/android-chrome-192x192.png?v=oLj4pxvJlO" sizes="192x192">
<link rel="icon" type="image/png" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/favicon-16x16.png?v=oLj4pxvJlO" sizes="16x16">
<link rel="manifest" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/manifest.json?v=oLj4pxvJlO">
<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/images/favicon/favicon.ico?v=oLj4pxvJlO">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php bloginfo( 'template_directory' ); ?>/images/favicon/mstile-144x144.png?v=oLj4pxvJlO">
<meta name="theme-color" content="#ffffff">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>



<div class="header">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">



                	<ul class="utility-nav pull-right">
                    <?php wp_nav_menu( array('theme_location' => 'utility-nav', 'container' => '', 'items_wrap' => '%3$s',)); ?>

                    <!--    <?php
if ( is_user_logged_in() ) { ?> <li><a href="/my-account/">My Account</a></li> <?php } else { } ?>-->

                        <li>
                        <?php
if ( is_user_logged_in() ) {
echo '<a href="'.wp_logout_url( home_url() ).'" title="Logout">Logout</a>';
} else {
echo '<a href="'.get_permalink( 1221 ).'" title="Login">Login</a>';
}
?>
                        </li>



                        <li class="social"><a href="http://www.facebook.com/yourjazmine" target="_blank" class="text-hide fb">Like us on Facebook</a></li>
                        <li class="social"><a href="https://twitter.com/yourjazmine" target="_blank" class="text-hide tw">Follow us on Twitter</a></li>
                    </ul>
                </div>
            </div>
    		 <div class="row">
                <div class="col-sm-3 logo">
                    <a href="/"><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo.png" class="img-responsive" alt="Jazmine"></a>
                </div>
                <div class="col-sm-9">
                   <div class="navbar">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
        </div>
		<div class="collapse navbar-collapse">
			<?php wp_nav_menu( array('theme_location' => 'main-nav' )); ?>
		</div>
	</div><!-- /navbar -->
                </div>
            </div>
        </div>
    </div><!-- /header -->