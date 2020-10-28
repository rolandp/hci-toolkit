<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<article role="main">

<?php while ( have_posts() ) : the_post(); ?>
<?php $postID = $post->ID;
$purpose = get_purpose($postID);
$poi = get_poi($postID);
$example = get_example($postID);
$reference = get_reference($postID);
$percentage = 1;
if ($purpose){ $percentage++; }
if ($poi){ $percentage++; }
if ($example){ $percentage++; }
if ($reference){ $percentage++; }
$percentage = $percentage * 10;
?>

<article id="post">
	<section><!-- Description -->
		<h2 class="title"><?php the_title(); ?></h2><span class="completion"><?php echo $percentage.'% complete' ?></span>
		<section class="phases-small"><!-- Phases -->		
			<?php $category = get_the_category(); foreach ($category as $cat){ $cats .= $cat->cat_name;}?>
			<img src="<?php bloginfo('template_directory'); ?>/images/understand_small<?php if(stristr($cats, 'understand')){echo '-active';}?>.png" alt="Applicable phase: understand" title="understand" /><img class="arrow-small" src="<?php bloginfo('template_directory'); ?>/images/understand-arrow_small.png" />
			<img src="<?php bloginfo('template_directory'); ?>/images/concept_small<?php if(stristr($cats, 'concept')){echo '-active';}?>.png" alt="Applicable phase: concept" title="concept" /><img class="arrow-small" src="<?php bloginfo('template_directory'); ?>/images/concept-arrow_small.png" />
			<img src="<?php bloginfo('template_directory'); ?>/images/design_small<?php if(stristr($cats, 'design')){echo '-active';}?>.png" alt="Applicable phase: design" title="design" /><img class="arrow-small" src="<?php bloginfo('template_directory'); ?>/images/design-arrow_small.png" />
			<img src="<?php bloginfo('template_directory'); ?>/images/develop_small<?php if(stristr($cats, 'develop')){echo '-active';}?>.png" alt="Applicable phase: develop" title="develop" /><img class="arrow-small" src="<?php bloginfo('template_directory'); ?>/images/develop-arrow_small.png" />
			<img src="<?php bloginfo('template_directory'); ?>/images/implement_small<?php if(stristr($cats, 'implement')){echo '-active';}?>.png" alt="Applicable phase: implement" title="implement" />
		</section>			
		<span class="description"><?php the_content(); ?></span>
	</section>
	
	<?php if (!empty($purpose)){?>
	<section><!-- Purpose -->
		<header>
			<h3>Purpose</h3>
		</header>
		<p><?php echo $purpose;?></p>
	</section>
	<?php } ?>
	
	<?php if (!empty($poi)){?>
	<section><!-- Points of interest -->
		<header>
			<h3>Points of interest</h3>
		</header>		
		<p><?php echo $poi;?></p>
	</section>
	<?php } ?>

	<?php if (!empty($reference)){?>
	<section><!-- References -->
		<header>
			<h4>References</h4>
		</header>	
		<ul class="reference"><?php foreach ($reference as $ref){
			echo "<li>".$ref."</li>";
		} ?></ul>
	</section>	
	<?php } ?>		
</article>	

<aside class="media">	
	<?php if (!empty($example)){?>
	<section><!-- Examples -->
		<header>
			<h4>Examples</h4>
		</header>			
		<p><?php echo $example;?></p>
	</section>	
	<?php } ?>		
</aside>

<aside>
	<section>
		<header>
			<h4>Research methods like this</h4>
		</header>			
			<ul class="like-this">
				<li><a href="#">Design</a></li>
			</ul>		
	</section>	
	
	<section>
		<header>
			<h4>Discussions about this method</h4>
		</header>			
		
	</section>			
</aside>

<section class="comments"><!-- Comments -->
	<div class="comment-header">
		<header>
			<h3>Share your feedback, opinions and suggestions</h3>
		</header>
	<!-- div gets closed by template -->
	<?php comments_template( '', true ); ?>
</section>
<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>