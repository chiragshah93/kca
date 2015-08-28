<?php
session_start();
include("cn.php");
include("common.php");
checklogin();


if(isset($_POST['submit']))
{
	    $title=$_POST['title'];
		 $desc=$_POST['desc'];
		  $order=$_POST['sort_order'];
		  $date=date();
			 
			  mysql_query("insert into news(title,description,date,sort_order) values('$title','$desc','$date','$order')")or die(mysql_error());
}	
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
	?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	background-image: url(../../vidhi12/abc.gif);
}
body,td,th {
	color: #660000;
}
-->
</style><title>Welcome to the KCA ...</title>
</head>
<body>

  <table width="1000" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
      <td align="center"><form name="form2" method="post" action="">
        <label>
          <div align="right"><?php echo $_SESSION['name'];?>
            <input name="logout" type="submit" id="logout" value="logout" />
            </div>
        </label>
        <div align="right"></div>
      </form>
        <p>
          <?php include_once("logo.php");?>
          </td>
    </tr>
    <tr><td colspan="3" bgcolor="#FF6666"><?php include_once("agentmenu.php");?>
     </td></tr>
    <tr>
      <td><form NAME ="frmOne" action="#" method="post">
        <table width="555" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="3"> <div align="center">
      <h1>NEWS</h1>
    </div></td>
    </tr>
  <tr>
    <td width="147"><div align="center">Title</div></td>
    <td width="261"><div align="center">DESCRIPTION</div></td>
    <td width="147"><div align="center">Sort Order</div></td>
  </tr>
  <tr>
    <td valign="top"><label>
      <input type="text" name="title" id="title">
    </label></td>
    <td><textarea name="desc" cols="40" rows="15" ><?php echo date('d-m-y');?></textarea></td>
    <td valign="top"><input id="sort_order" type="text" name="sort_order"></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><input type="submit" name="submit" value="submit"></div></td>
    </tr>
</table>

        <div align="center"></div>
      </form></td>
    </tr>
    <tr>
    
      <td align="right"><?php include_once("footer.php");?>        </td>
    </tr>
  </table>

</body>
</html>