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

<div class="header-pane">
  <div class="home-campaign" style="background-image: url(<?php echo "$header_image" ?>);">
    <div class="inner">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2><?php echo "$header_title" ?></h2>
            <?php echo "$header_desc" ?> </div>
          <div class="col-md-4">
            <div class="signup-box">
              <div class="inside">
                <h4>It All Starts with Signing Up</h4>
                <div class="form-group">
                  <label for="username">Enter Your Email</label>
                  <input type="text" class="form-control" id="email" placeholder="email">
                </div>
                <a onclick="return LoadSignUp();" id="btnGetStarted" class="btn btn-default" href="/sign-up">Get Started</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
var number = 1 + Math.floor(Math.random() * 5);
$(".home-campaign").addClass("home-campaign"+number);
</script>

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
<div class="mainContent">
  <div class="inner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /mainContent -->

<div class="gradient-blue">
	<div class="container">
    	
	
	<h2>Organization central, here you come.</h2>
<a href="/pricing/" class="btn btn-primary">Sign Up Now</a>
</div>

</div>


<?php get_footer(); ?>
