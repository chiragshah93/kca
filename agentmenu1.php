<?php

if(isset($_GET['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!--
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>
<form>
<div class="navbar-default" style="background-color:#FF6666; font-size:medium;">
	<div class="container">
		
        <div class="nav-stacked">
        <div class="navbar-header">
        	<a href="#" class="navbar-brand"><span class="glyphicon glyphicon-home"></span>KCA</a>
        </div>

        	<ul class="nav nav-tabs">
            	<li><a href="agenthome.php">Home</a></li>
                
                <li><a href="" data-toggle="dropdown" class="dropdown-toggle">My Client</a>
                	<ul class="dropdown-menu">
                    	<li><a href="clientdelete1.php">Display</a></li>
         				 <li><a href="clientinsert1.php">Insert</a></li>
                    </ul>
                </li>
                    <li><a href="transaction.php">Order</a></li>
                     <li><a href="agentoffer.php">Agent Offer</a></li>
                   <li class="pull-right"><span class="glyphicon glyphicon-user"></span><label><?php echo $_SESSION['username'];?>
                    <input name="logout" class="btn btn-group-lg btn-info" type="submit" id="logout" value="logout" />
                    </label>
                </li>
            </ul>	
            
           </div>
	</div> 
</div>
</form>
<!--
<table width="1000" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="agenthome.php" class="style1">Home</a> </li>
  <li><a href="#" class="style1 MenuBarItemSubmenu">Myclient</a>
    <ul>
      <li><a href="clientdelete1.php">Display</a></li>
      <li><a href="clientinsert1.php">Insert</a></li>
    </ul>
     </li>
     <li><a href="transaction.php" class="style1 MenuBarItemSubmenu">Order</a>
     </li>

     </ul>
     
    </td>
    <td align="right">
     <label>        <input name="logout" type="submit" id="logout" value="logout" />
        </label>
        </td>
  </tr>
</table>

<script type="text/javascript">

var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});

</script>
--></body>
</html>
