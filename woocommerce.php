<?php get_header(); 
global $post;
$slug = get_post( $post )->post_name;
$header_title = get_post_meta($post->ID, '_cmb_header_title', true);
$header_desc = wpautop(get_post_meta($post->ID, '_cmb_header_desc', true));
$header_image = get_post_meta($post->ID, '_cmb_header_image', true);
$header_height = get_post_meta($post->ID, '_cmb_header_height', true);

$testimonial_bg = get_post_meta($post->ID, '_cmb_testimonial_bg', true);
$testimonial_author = get_post_meta($post->ID, '_cmb_testimonial_author', true);
$testimonial_quote = get_post_meta($post->ID, '_cmb_testimonial_quote', true);
?>

<?php
if (empty($header_image)) { ?>
  
 
   
<?php } else { ?>
 <div class="header-pane">
	<div class="<?php echo "$slug" ?> bg-img" style="background-image: url(<?php echo "$header_image" ?>);">
		<div class="inner" style="min-heght: <?php echo "$header_height" ?>px;">
            <div class="container">
            	<div class="textWrap">
            	<h2><?php echo "$header_title" ?></h2>
            	<?php echo "$header_desc" ?>
            	</div>
            </div>
        </div>
    </div>
</div>
<?php } ?>



<div class="mainContent"><div class="inner">
    	<div class="container">
            <div class="row">
                <div class="col-md-12">
		<?php woocommerce_content(); ?></div>
            </div> 
        </div>   
    </div></div><!-- /mainContent -->


<?php
if (empty($testimonial_quote)) { ?>
  
<?php } else { ?>

<div class="testimonialWrap" style="background-color: <?php echo "$testimonial_bg" ?>;">
    <div class="container">
    
    <p style="text-align: center;">"<?php echo "$testimonial_quote" ?>"</p>
    <p style="text-align: right;">&ndash; <?php echo "$testimonial_author" ?></p>
    
    </div>
</div>

<?php } ?>


<?php get_footer(); ?>



