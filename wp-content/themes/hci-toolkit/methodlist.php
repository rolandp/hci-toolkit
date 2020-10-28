<?php

/* Connection vars here for example only. Consider a more secure method. */
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'hci-toolkit';
 
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);


$return_arr = array();

$fetch = mysql_query("SELECT * FROM wp_posts WHERE post_title LIKE '%" . mysql_real_escape_string($_GET['term']) . "%'") or die (mysql_error());

/* Retrieve and store in array the results of the query.*/
while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
	$row_array['test'] = $row['post_title'];

	array_push($return_arr,$row_array);
}
// open file
$fd = fopen('log.txt', "a");
foreach($return_arr as $arr){
	$str = implode(',', $arr);
	// write string
	fwrite($fd, $str . "\n");
}
// close file
fclose($fd);
/* Toss back results as json encoded array. */
echo json_encode($return_arr);

?>