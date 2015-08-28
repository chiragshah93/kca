<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
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
			mysql_query("DELETE FROM feedback WHERE uid=".$_POST["d$i"],$link);
			$td++;
		}
	}

//	$msg = "$td record(s) deleted!";
}

if(isset($_POST['Approval']))
{
	$username=$_POST['username'];
	$comment=$_POST['comment'];
	$result = mysql_query("update feedback set status='1' where username='$username'");
		$msg = "New record is saved";
}


$result = mysql_query("Select * from feedback where status='0'",$link);
$num = mysql_num_rows($result);
$n = 0;
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

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2"><div align="right"><form action="" method="post"><?php echo $_SESSION['name'];?>
        <input name="logout" type="submit" id="logout" value="logout" /></form>
    </div></td>
  </tr>
  <tr>
    <td width="500" colspan="2"><?php include_once("logo.php");?></td>
  </tr>
  <tr>
    <td colspan="4" bgcolor="FF6666"><?php include_once("agentmenu.php");?></td>
  </tr>
 <tr>
    <td colspan="2">
    <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Feedback</li>
</ul>
    </td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
        <tr class="bg-danger">
          <td colspan="3" align="center"><font color="#660000" size="5"><h1>Feedback</h1></font></td>
          </tr>
          <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
        
        <tr>
          <td width="48" align="center"><input type="checkbox" name="d<?php echo $n;?>"  value="<?php echo $row['uid'];?>"/></td>
          <td width="700"><table width="748" border="0" cellspacing="0" cellpadding="0">
           
            <tr>
              <td width="349" valign="bottom">&nbsp;<strong><font color="#660000">Username</font></strong> :
                <input type="text" name="username" value="<?php echo $row['username'];?>"  readonly="readonly"/></td>
              <td width="399" valign="bottom">&nbsp;<font color="#660000"><strong>Comments</strong> : </font>
                <textarea name="comment" readonly="readonly" cols="15" rows="2"><?php echo $row['comment'];?></textarea></td>
            </tr>
            
            

           </table>
           <hr>           </td>
          </tr>
        <?php

 }?>
        <tr>
              <td><div align="center">
                              </div></td>
              <td><input type="submit" name="Delete" id="Delete" value="Delete" class="btn btn-group-sm btn-info" />
                <input name="total" type="hidden" id="total" value="<?php echo $n?>">
<input type="submit" name="Approval" id="Approval" value="Approval" class="btn btn-group-sm btn-info" /></td>
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
