
<?php if(isset($_GET['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
	?>


<html>
<head>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {font-size: 83%}
-->
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>
<form>
<table width="1000" border="0" cellspacing="0" cellpadding="0">
<tr>

<td><div class="navbar-default" style="background-color:#FF6666; font-size:medium;">
	<div class="container">
		<div class="navbar-header">
        	<a href="#" class="navbar-brand"><span class="glyphicon glyphicon-home"></span>KCA</a>
        </div>

        <div class="nav-stacked">
        	<ul class="nav nav-tabs">
            	<li><a href="feedback.php">Home</a></li>
                 <li><a href="clientgallery.php">Product Details</a></li>
                 <li><a href="agentinquiry.php">Agent Inquiry</a></li>
                     
                   <li class="pull-right"> <label><?php echo $_SESSION['username'];?>
                    <input name="logout" type="submit" id="logout" value="logout" />
                    </label>
                </li>
            </ul>	
            
           </div>
	</div> 
</div>

</td>
</tr>
</table>
</form>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
-->
</script>
</body>
</html>
