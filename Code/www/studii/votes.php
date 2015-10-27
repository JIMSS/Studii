<?php
	include("connect.php");
	
	function getTotalVotes($pID)
	{
		$votes = array();
		$sql = "select * from replies where id = $pID";
		
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_assoc($result);
			
			$votes[0] = $row['votes'];
		}
		return $votes;
	}
	
	$id = $_POST['id'];
	$current_votes = getTotalVotes($id);	
	$votes = $current_votes[0]+1;
	
	$sql = "update replies set votes = $votes where id = $id";
	$result = mysql_query($sql);
	
	if($result)
	{
		echo 'worked';
	}
	else
	{
		echo 'oops'
	}
?>