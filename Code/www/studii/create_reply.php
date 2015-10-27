<?php
	include ("connect.php");
	
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo 'uh oh';
	}
	else
	{
		$content = mysql_real_escape_string($_POST['reply-content']);
		$topic_id = mysql_real_escape_string($_GET['id']);
		
		$sql = "insert into posts(post_content, post_date, post_topic, post_by)
		values ('$content', NOW(), '$topic_id', 'test')";
		$result = mysql_query($sql);
		
		if($result)
		{
			echo 'added reply';
		}
		else
		{
			echo 'ooops';
		}
	}
?>