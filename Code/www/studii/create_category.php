<?php
	include ("connect.php");
	
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		echo 'display form/post here';
	}
	else
	{
		$name = mysql_real_escape_string($_POST['cat_name']);
		$description = mysql_real_escape_string($_POST['cat_description']);
		$sql = "insert into categories(cat_name, cat_description) 
		values('$name','$description')";
		
		$result = mysql_query($sql);
		if($result)
		{
			echo 'yay cat added';
		}
		else
		{
			echo 'oops something went wrong';
		}
	}
?>