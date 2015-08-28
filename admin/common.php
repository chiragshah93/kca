<label></label>
<?php
function checklogin()
{
	
	if(!isset($_SESSION['login']))
		header("location:index.php");
}

?>
