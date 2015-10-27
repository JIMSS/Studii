<?php
	include ("connect.php");
	
	//todo check if user is signed up here
	
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//show form
	}
	else
	{
		//process form
		$query = "begin work;";
		$result = mysql_query($query);
		if($result)
		{
			$subject = mysql_real_escape_string($_POST['topic_subject']);
			$category = mysql_real_escape_string($_POST['topic_cat']);
			
			//todo update topic_by with actual username
			$sql = "insert into topics(topic_subject, topic_date, topic_cat, topic_by)
			values('$subject', NOW(),'$category','test')";
			
			$result = mysql_query($sql);
			if($result)
			{
				$content = mysql_real_escape_string($_POST['post_content']);
				$topic_id = mysql_insert_id();
				
				//todo update post_by with actual username
				$sql = "insert into posts(post_content, post_date, post_topic, post_by)
				values('$content', NOW(), '$topic_id', 'test')";
				
				$result = mysql_query($sql);
				
				if($result)
				{
					$sql = "commit;";
					$result = mysql_query($sql);
				}
				else
				{
					//rollback
					$sql = "rollback;";
					$result = mysql_query($sql);
				}
			}
			else
			{
				//rollback
				$sql = "rollback;";
				$result = mysql_query($sql);
			}
		}
		else
		{
			echo 'oops something went wrong';
		}
	}
?>