<?php get_header(); 
global $post;
$slug = get_post( $post )->post_name;
$header_title = get_post_meta($post->ID, '_cmb_header_title', true);
$header_desc = wpautop(get_post_meta($post->ID, '_cmb_header_desc', true));
$header_image = get_post_meta($post->ID, '_cmb_header_image', true);
$header_height = get_post_meta($post->ID, '_cmb_header_height', true);
?>


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




<div class="mainContent"><div class="inner">
    	<div class="container">
            <div class="row">
                
                <h1 class="title">Recent Posts</h1>
                <div class="articleList">
 <?php  $args = array( 'posts_per_page' => -1 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); 
			
			?>
<div class="row spacebottom">

         <div class="col-md-12">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="small">by Jazmine on <?php the_time('l, F jS, Y') ?></p>
              <?php the_excerpt(); ?>
          </div>

</div>
<hr>
<?php endwhile; // end of the loop. ?>
</div>
                
                
                
        </div>   
    </div></div><!-- /mainContent -->

<?php get_footer(); ?>







