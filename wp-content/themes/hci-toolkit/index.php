<?php

get_header(); ?>

<div class="content">
<article role="main">

	<section class="column">
		<img src="<?php bloginfo('template_directory'); ?>/images/understand.png" alt="Read more about the understanding phase" title="understand" /><img class="arrow" src="<?php bloginfo('template_directory'); ?>/images/understand-arrow.png" />
		<?php get_methods_by_cat('understand'); ?>
	</section><!-- /understand -->
	
	<section class="column">
		<img src="<?php bloginfo('template_directory'); ?>/images/concept.png" alt="Read more about the concepting phase" title="concept" /><img class="arrow" src="<?php bloginfo('template_directory'); ?>/images/concept-arrow.png" />
		<?php get_methods_by_cat('concept'); ?>
	</section><!-- /concept -->	
	
	<section class="column newrow">
		<img src="<?php bloginfo('template_directory'); ?>/images/design.png" alt="Read more about the designing phase" title="design" /><img class="arrow" src="<?php bloginfo('template_directory'); ?>/images/design-arrow.png" />
		<?php get_methods_by_cat('design'); ?>
	</section><!-- /design -->		

	<section class="column">
		<img src="<?php bloginfo('template_directory'); ?>/images/develop.png" alt="Read more about the developing phase" title="develop" /><img class="arrow" src="<?php bloginfo('template_directory'); ?>/images/develop-arrow.png" />
		<?php get_methods_by_cat('develop'); ?>
	</section><!-- /develop -->

	<section class="column newrow no-right">
		<img src="<?php bloginfo('template_directory'); ?>/images/implement.png" alt="Read more about the implementation phase" title="implement" />
		<?php get_methods_by_cat('implement'); ?>
	</section><!-- /understand -->	
	
</article><!-- /main content -->		
</div><!-- /content -->
<?php get_footer(); ?>