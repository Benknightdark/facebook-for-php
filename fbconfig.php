<?php
require_once 'facebook.php';
$facebook_appid='your app id';//輸入你的應用程式的id
$facebook_app_secret='your app secret';//輸入你的應用程式的金鑰
$facebook = new Facebook(array(
'appId' => $facebook_appid,
'secret' => $facebook_app_secret,
));
?>
