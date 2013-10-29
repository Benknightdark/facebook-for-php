<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
require_once 'facebook.php';
require 'fbconfig.php';
$user = $facebook->getUser();//取回當前用戶的ID
if ($user)//如果此用戶的facebookID是否存在
{
		$logoutUrl = $facebook->getLogoutUrl(array(
        'next' => 'http://ben.local/fbtest/logout.php'//需要改成自己網站的網址
    ));
		$token = $facebook->getAccessToken();
try 
	{
		$userdata=$facebook->api('/me');//撈facebook個人資料
		//$photos = $facebook->api('/me/photos?limit=10000');//撈使用者被tag的照片，最多撈到10000張
		//$statuses = $facebook->api('/me/statuses?limit=10000');//撈使用者發佈的動態文字訊息，最多撈到10000筆
		//$links=$facebook->api('/me/links?limit=10000');//撈使用者發佈的連結，最多撈到10000筆
		
		
	} 
	
catch (FacebookApiException $e) 
	{
		error_log($e);
		$user = null;
	}

	
//把撈到的facebook個人資料存入session

$_SESSION['userdata']=$userdata;
//$_SESSION['photos'] = $photos;
//$_SESSION['statuses'] = $statuses;
//$_SESSION['links']=$links;
//$_SESSION['posts']=$posts;
//$_SESSION['logout'] = $logoutUrl;

//連接到show.php

header("Location: show.php"); 


	}
else
	{ 
	//尚未加入此應用程式者，將會進入授權畫面，取得使用者同意後，即可存取使用者資訊
$loginUrl = $facebook->getLoginUrl(array(
 'scope' => 
 'user_about_me, user_activities, user_birthday,user_checkins, user_hometown,user_interests
 ,user_likes,user_location, user_photo_video_tags, user_photos,user_relationships
 ,user_relationship_details, user_status,user_videos,user_work_history,email,read_friendlists,
 read_stream,friends_photos,friends_likes,friends_about_me,friends_interests,friends_actions.books,
 friends_actions.music,friends_actions.news,friends_actions.video,friends_activities,
 friends_birthday,friends_education_history,friends_events,friends_games_activity,
 friends_groups,friends_hometown,friends_location,
 friends_notes,friends_questions,friends_relationship_details,
 friends_relationships,friends_religion_politics,
friends_status,friends_subscriptions,friends_videos,friends_website,friends_work_history'


));
echo '<a href="'.$loginUrl.'">login</a>';


}

?>





