<label></label>
<?php
function checklogin()
{
	
	if(!isset($_SESSION['submit']))
		header("location:index.php");
}

?>
