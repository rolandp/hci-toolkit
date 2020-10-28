<?php
require_once 'library/facebook.php';

$app_id = "258678500838261";
$app_secret = "5fdef2c96fcefb7fa1bdcd5fd14acf58 ";

$facebook = new Facebook(array(
	'appId' => $app_id,
	'secret' => $app_secret,
	'cookie' => true
));

if(is_null($facebook->getUser()))
{
	header("Location:{$facebook->getLoginUrl(array('req_perms' => 'user_status,publish_stream,user_photos'))}");
	exit;
}