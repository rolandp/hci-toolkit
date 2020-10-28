<?php
/**
Template Name: About
*/

get_header(); ?>

<div class="content">
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
</div>