<?php
require_once 'facebook.php';
$facebook_appid='413103708754525';
$facebook_app_secret='c84c3990d6b47a60c2f33ea29c127364';
$facebook = new Facebook(array(
'appId' => $facebook_appid,
'secret' => $facebook_app_secret,
));
?>
