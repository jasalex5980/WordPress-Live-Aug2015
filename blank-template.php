<?php
/*
Template Name: Blank Page
*/


?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else : ?>

<?php endif; ?>
   







