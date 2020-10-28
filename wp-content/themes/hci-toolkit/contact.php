<?php
/**
Template Name: Contact
*/

get_header(); ?>

<!-- LOOP beginnen -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<article>
		<header>
			<h2><?php the_title(); ?></h2>
		</header>
		<?php the_content(); ?>
		
	</article>
<!-- THE LOOP afsluiten -->			
<?php endwhile; endif; ?>	