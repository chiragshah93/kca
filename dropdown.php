<?php
$aname=$_SESSION['username'];
$retrive=mysql_query("select clientname from client where aname='$aname'",$link);
	
	echo "<select name='codelist' id='codelist'>";
	if(!empty($_SESSION['dropdown']))
	{
		while($row=mysql_fetch_array($retrive))
		{if($_SESSION['dropdown']==$row['clientname'])
			echo "<option value=".$row['clientname']." selected='selected'>".$row['clientname']."</option>";
		else
			echo "<option value=".$row['clientname'].">".$row['clientname']."</option>";		
		}
	}
	else
		while($row=mysql_fetch_array($retrive))
		{
	echo "<option value=".$row['clientname'].">".$row['clientname']."</option>";
	}
echo "</select>";
?>


