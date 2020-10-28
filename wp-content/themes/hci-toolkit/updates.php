<?php
/**
Template Name: Updates
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
	<article id="update-comments">
		<?php $args = array('status' => 'approve', 'number' => '15'); $comments = get_comments($args); 
		foreach ($comments as $comment): 
			$postID = $comment->comment_post_ID; ?>
			<section class="update-comment">
				<header>
					<span class="comment-meta comment-name"><?php echo $comment->comment_author; ?></span><span class="comment-meta"> commented on <a href="<?php echo get_permalink($postID); ?>"><?php echo get_the_title($postID); ?></a>, saying: </span>
				</header>
				<p><?php echo $comment->comment_content; ?></p>
				<a href="<?php echo get_permalink($postID); ?>">Respond to this comment</a>
			</section>
		<?php endforeach;?>
	</article>
<!-- THE LOOP afsluiten -->			
<?php endwhile; endif; ?>	
</div>