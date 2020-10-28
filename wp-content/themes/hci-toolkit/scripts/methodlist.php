<?php
 require('../../../../wp-blog-header.php');
 header("HTTP/1.1 200 OK");


// get matched results
$fetch = mysql_query("SELECT DISTINCT * FROM wp_posts WHERE post_title LIKE '%" . mysql_real_escape_string($_GET['term']) . "%' AND post_type = 'post'") or die (mysql_error());
$return_arr = array();
/* Retrieve and store in array the results of the query.*/
while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	$row_array['value'] = $row['post_title'];

	array_push($return_arr,$row_array);
}

// get all current method names
$query = mysql_query("SELECT DISTINCT post_title FROM wp_posts WHERE post_type = 'post'") or die (mysql_error());
$return_arr2 = array();
while ($row2 = mysql_fetch_array($query, MYSQL_ASSOC)) {
	$row_array2 = $row2['post_title'];
	
	array_push($return_arr2,$row_array2);
}
// write methods to file for later use by AJAX call
// open file
$fd = fopen('methods.txt', "w");
foreach($return_arr2 as $arr2){
	//$str2 = implode(',', $arr2);
	// write string
	fwrite($fd, $arr2 . ",");
}
// close file
fclose($fd);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

?>