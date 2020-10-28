<?php
function cookie(){
	$title = trim(strtolower(wp_title( '', false)));
	$month = 2592000 + time();
	$now = date("Y/m/d h:i:s");
	if ($title == 'updates'){
		setcookie('lastVisit', $now, $month,'/');
		$last = $now;
	}
	else {
		if(isset($_COOKIE['lastVisit']))
		{ 
			$last = $_COOKIE['lastVisit'];
		} 
		else 
		{ 
			setcookie('lastVisit', $now, $month,'/');
			$last = $now;
		} 
	}
	return $last;
}
?>
<?php
function newComments($last){
#echo $last;
	$result = mysql_query('SELECT count(comment_ID) FROM wp_comments WHERE comment_date_gmt > "'.$last.'"') or die(mysql_error());
	$row = mysql_fetch_array($result);
	return $row[0];
}
?>
<?php
function get_methods_by_cat($catslug){
	$args = array ('category_name' => $catslug, 'orderby' => 'title', 'order' => 'ASC');
	$method_query = new WP_Query( $args );?>
	<ul class="method-list">
	<?php while ($method_query->have_posts() ) : $method_query->the_post();?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
	<?php endwhile;?>
	</ul>		
	<?php wp_reset_postdata();
}

//this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
       <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	
         <?php comment_text() ?>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   </div>
   <div class="clear"></div>
<?php } ?>