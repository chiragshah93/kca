<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>

<?php
if(isset($_POST['Delete']))
{
	$total = $_POST['total'];
	$td = 0;
	$i = 0;
	
	for($i = 1; $i <= $total; $i++)
	{
		if(isset($_POST["d$i"]))
		{
			mysql_query("DELETE FROM agent WHERE aid=".$_POST["d$i"],$link);
			$td++;
		}
	}

//	$msg = "$td record(s) deleted!";
}



$result = mysql_query("Select * from agent",$link);
$num = mysql_num_rows($result);
$n = 0;
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to the KCA ...</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body bgcolor="#CCCCFF">

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="shadow1">
  <tr>
    <td colspan="2"><div align="right"><form action="" method="post"><?php echo $_SESSION['name'];?>
        <input name="logout" type="submit" id="logout" value="logout" /></form>
    </div></td>
  </tr>
  <tr>
    <td width="500" colspan="2"><?php include_once("logo.php");?></td>
  </tr>
  
 <tr>
    <td colspan="2">    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="#FF6666"><?php include_once("agentmenu.php");?></td>
  </tr>
  <tr>
    <td colspan="2"><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Main<span class="divider">&raquo;</span></li>
<li>My Agent<span class="divider">&raquo;</span></li>
<li>Display</li>
</ul></td>
  </tr>
  
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="858" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
        <tr>
          <td width="48" align="center" valign="top"><font size="5"><a href="agentdisplay.php"><span class="glyphicon glyphicon-plus"></span></a></font></td>
          <td colspan="3" align="center" class="bg-danger"><font color="#660000" size="7">Agent</font></td>
          </tr>
          <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
        
        <tr>
          <td align="center"><input type="checkbox" name="d<?php echo $n;?>"  value="<?php echo $row['aid'];?>"/></td>
          <td width="52"><a href="agentdisplay.php?aid=<?php echo $row['aid']?>"><font size="5"><span class="glyphicon glyphicon-pencil"></span></font></a></td>
          <td width="758"><table width="759" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td><strong><font color="#660000">Agent ID</font></strong> : <?php echo $row['eid'];?></td>
              <td width="320"><font color="#660000"><strong>Admin ID</strong> : </font><?php echo $row['adminid'];?></td>
            </tr>
            <tr>
              <td height="37"><font color="#660000"><strong>Name</strong> : </font><?php echo $row['name'];?></td>
              <td width="320"><font color="#660000"><strong>Address</strong> : </font><?php echo $row['address'];?></td>
            </tr>
            <tr>
              <td width="439"><font color="#660000"><strong>Username</strong> : </font><?php echo $row['username'];?></td>
              <td width="320"><font color="#660000"><strong>Password</strong> : </font><?php echo $row['password'];?></td>
            </tr>
            <tr>
              <td width="439"><font color="#660000"><strong>Date Of joining</strong> : </font><?php echo $row['doj'];?></td>
              <td width="320"><font color="#660000"><strong>Date Of Birth</strong> : </font><?php echo $row['dob'];?></td>
            </tr>
            <tr>
              <td><font color="#660000"><strong>Phone</strong> : </font><?php echo $row['phone'];?></td>
              <td>&nbsp;</td>
            </tr>
           </table>
           <hr>           </td>
          </tr>
        <?php

 }?>
        <tr>
          <td>&nbsp;</td>
          <td align="center">
            <input type="submit" name="Delete" id="Delete" value="Delete" />
          <input name="total" type="hidden" id="total" value="<?php echo $n?>"></td>
        </tr>
      </table>
        </form>    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php include_once("footer.php");?></td>
  </tr>
</table>

</body>
</html>
