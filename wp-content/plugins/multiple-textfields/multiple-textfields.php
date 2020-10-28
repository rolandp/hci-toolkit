<?php
/*
Plugin Name: Multiple textfields
Description: Adds various extra WYSIWYG text areas to posts pages for specific data input
Version: 0.1
Author: Roland Pastoor
Author URI: http://www.rolandpastoor.nl
*/

add_filter('wp_head','add_tinymce_editor');

//add custom stylesheet 
wp_register_style( 'mtf-stylesheet', plugins_url('css/stylesheet.css', __FILE__) );
wp_enqueue_style( 'mtf-stylesheet' );

//add custom javascript
function add_jquery() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'add_jquery');
wp_register_script( 'mtf-javascript', plugins_url('js/script.js', __FILE__) );
wp_enqueue_script( 'mtf-javascript' );

 function add_tinymce_editor(){
  wp_admin_css('thickbox');
  wp_enqueue_script('post');
  wp_enqueue_script('media-upload');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_script('jquery-ui-tabs');
  wp_enqueue_script('tiny_mce');
  wp_enqueue_script('editor');
  wp_enqueue_script('editor-functions');
  add_thickbox();
  
  wp_enqueue_script('thickbox');
  
 }
 
 // WP 3.0+
add_action( 'add_meta_boxes', 'mtf_add_custom_boxes' );

// backwards compatible
//add_action( 'admin_init', 'mediabox_add_custom_box', 1 );

add_action('save_post', 'mtf_save_postdata');

/* Adds a box to the main column on the Page edit screens */
function mtf_add_custom_boxes() {
    add_meta_box('mtf_purpose_sectionid', 'Purpose', 'mtf_purpose', 'post', 'normal', 'high');
	add_meta_box('mtf_poi_sectionid', 'Points of interest', 'mtf_poi', 'post', 'normal', 'high');
	add_meta_box('mtf_reference_sectionid', 'Reference', 'mtf_reference', 'post', 'normal', 'high');
	add_meta_box('mtf_examples_sectionid', 'Examples', 'mtf_examples', 'post', 'normal', 'high');
}

/* Prints the box content */
function mtf_purpose( $post ) {
	
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'mtf_purpose_noncename' );
	
  $purpose = get_post_meta($post->ID, '_mtf_purpose');
  if (!isset ($purpose_content) ){
	$purpose_content = $purpose[0];
  }
  else{
	$purpose_content = $purpose;
  }
	  // The actual fields for data entry
	 the_editor($purpose_content, $id = 'purpose', $prev_id = 'title', $media_buttons = true, $tab_index = 2);
}

function mtf_poi( $post ) {
	
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'mtf_poi_noncename' );
	
  $poi = get_post_meta($post->ID, '_mtf_poi');
  if (!isset ($poi_content) ){
	$poi_content = $poi[0];
  }
  else{
	$poi_content = $poi;
  }
	  // The actual fields for data entry
	 the_editor($poi_content, $id = 'poi', $prev_id = 'title', $media_buttons = true, $tab_index = 3);
	  
}

function mtf_reference( $post ) {
	
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'mtf_reference_noncename' );
	
  $reference = get_post_meta($post->ID, '_mtf_reference');
  if (!isset ($reference_content) ){
	$reference_content = $reference[0];
  }
  else{
	$reference_content = $reference;
  }
  $reference_content = explode(",", $reference_content);
  $reference_content = str_replace("&#44;", ",", $reference_content);
  ?>
  <!-- explanation about the formats used for the reference field(s) -->
	<div class="show-info">Show info</div>
	<div class="reference-info">
	<div class="close-info">close<img class="icon" src="<?php echo plugin_dir_url(__FILE__); ?>images/close_icon.jpg" /></div>
		<h4>Verwijzen naar boeken</strong></h4>
		Achternaam auteur, voorletter(s) (Jaar van uitgave). Titel. Eventuele subtitel. Plaats uitgever: uitgever.<br />
		<i>Voorbeeld</i><br />
		Radzinsky E., Stalin (1996), Onthullingen uit geheime privé-archieven, Amsterdam. Uitgeverij Balans. Bladzijde 123<br />
		In de literatuurlijst komen de boeken alfabetisch op naam van de auteur!<br />
		<h4 class="margin-top">Verwijzen naar internetbronnen</h4>
		Achternaam auteur, voorletter(s) (Publicatiejaar of update). Titel van de website. Geraadpleegd op dag maand jaar, adres website.<br />
		<i>Voorbeeld</i><br />
		Meijden, B. van der (1998). Schiphol als thema voor een geschiedenis-, internet- en/of profielwerkstuk.Geraadpleegd op 7 juli 2005, http://www.histopia.nl/schiphol.htm <br />
		<h4 class="margin-top">Verwijzen naar kranten- en tijdschriftartikelen</h4>
		Achternaam auteur, voorletter(s) (Publicatiedatum). Titel artikel. Eventuele subtitel. In: naam van tijdschrift of krant nummer, paginanummer(s). <br /> 
		<i>Voorbeeld</i><br />
		Ouwerkerk, D. van en J. van der Grinten (2004). De kracht van zacht. Wat mannen over vrouwelijke vergaderstijlen kunnen leren. In: Interne Communicatie 4, p. 11-13.
	</div>
	<input class="field-counter" type="text" name="amount" value="<?php echo count($reference_content);?>" />
	<?php $i = 0;
	foreach ($reference_content as $value){ $i++; ?>
	<div class="input-container">
		<textarea class="reference" name="ref-<?php echo $i;?>"><?php echo $value; ?></textarea><img class="icon add-more" src="<?php echo plugin_dir_url(__FILE__); ?>images/plus_icon.jpg" />
	</div>
  <?php }
}

function mtf_examples( $post ) {
	
  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'mtf_examples_noncename' );
	
  $examples = get_post_meta($post->ID, '_mtf_examples');
  if (!isset ($example_content) ){
	$example_content = $examples[0];
  }
  else{
	$example_content = $examples;
  }
  // The actual fields for data entry
 the_editor($example_content, $id = 'examples', $prev_id = 'title', $media_buttons = true, $tab_index = 4);
}


/* When the post is saved, saves our custom data */
function mtf_save_postdata( $post_id ) {
  // verify if this is an auto save routine. 
  // If it is our form has not been submitted, so we dont want to do anything
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return;

  // verify this came from the our screen and with proper authorization,
  // because save_post can be triggered at other times

  if ( !wp_verify_nonce( $_POST['mtf_purpose_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  
  // Check permissions
  if ( 'page' == $_POST['post_type'] ) 
  {
    if ( !current_user_can( 'edit_page', $post_id ) )
        return;
  }
  else
  {
    if ( !current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // OK, we're authenticated: we need to find and save the data

    $purpose = $_POST['purpose'];
	$poi = $_POST['poi'];
	//$reference = $_POST['ref-1'];
	$amount = $_POST['amount'];
	$refArr = array();
	for ($i = 1; $i <= $amount; $i++){
		$temp = $_POST['ref-'.$i];
		$temp = str_replace(",", "&#44;", $temp);
		array_push($refArr, $temp);
	}
	$reference = implode(",",$refArr);
	$example = $_POST['examples'];
  // Do something with $mydata 
  // probably using add_post_meta(), update_post_meta(), or 
  // a custom table (see Further Reading section below)
  
	global $post;
	update_post_meta($post->ID, '_mtf_purpose', $purpose);
	update_post_meta($post->ID, '_mtf_poi', $poi);
	update_post_meta($post->ID, '_mtf_reference', $reference);
	update_post_meta($post->ID, '_mtf_examples', $example);
}

function get_purpose($postID) {
	//echo $postID;
	//fix voor homepage
	if($postID === 122){$postID=9;}
	
	$purpose = get_post_meta($postID, '_mtf_purpose');
	return $purpose[0];
}

function get_poi($postID) {
	$poi = get_post_meta($postID, '_mtf_poi');
	if ($poi){
		return $poi[0];
	}
}

function get_example($postID) {
	$example = get_post_meta($postID, '_mtf_examples');
	if ($example){
		return $example[0];
	}
}
function get_reference($postID) {
	$reference = get_post_meta($postID, '_mtf_reference');
	if (!isset ($reference_content) ){
		$reference_content = $reference[0];
	}
	else{
		$reference_content = $reference;
	}
	$reference_content = explode(",", $reference_content);
	$reference_content = str_replace("&#44;", ",", $reference_content);	
	$pattern = '(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)';
	$replacement = '<a href="$&">Source</a>';
	$reference_content = preg_replace($pattern, $replacement, $reference_content);
	return $reference_content;
}
?>