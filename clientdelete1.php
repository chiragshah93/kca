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
			mysql_query("DELETE FROM client WHERE cid=".$_POST["d$i"],$link);
			$td++;
		}
	}

//	$msg = "$td record(s) deleted!";
}


$aname=$_SESSION['username'];
$result = mysql_query("Select * from client where aname='$aname'",$link);
$num = mysql_num_rows($result);
$n = 0;
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:login.php");
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

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  
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
    <td colspan="4"><?php include_once("agentmenu1.php");?></td>
  </tr>
    <tr>
    <td colspan="2"><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Client<span class="divider">&raquo;</span></li>
<li>Display</li>
</ul></td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="bg-danger">
          <td width="38" align="center"><font size="5"><a href="clientdisplay.php"><span class="glyphicon glyphicon-plus"></span></a></font></td>
          <td colspan="4" align="center"><font color="#660000" size="5">
          <h1> Client </h1>
          </font></td>
          </tr>
          <?php while($row = mysql_fetch_array($result, MYSQL_BOTH)){
$n++;
?>
        
        <tr>
          <td align="center"><input type="checkbox" name="d<?php echo $n;?>"  value="<?php echo $row['cid'];?>"/></td>
          <td width="74"><a href="clientdisplay.php?cid=<?php echo $row['cid']?>"><font size="5"><span class="glyphicon glyphicon-pencil"></span></font></a></td>
          <td colspan="2"><table width="833" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
              <td height="35">&nbsp;<strong><font color="#660000">Agent ID</font></strong>: <?php echo $row['eid'];?></td>
              <td width="394">&nbsp;<font color="#660000"><strong>Client ID</strong>: </font><?php echo $row['cid'];?></td>
            </tr>
            <tr>
              <td height="32">&nbsp;<font color="#660000"><strong>Name</strong>: </font><?php echo $row['clientname'];?></td>
              <td width="394">&nbsp;<font color="#660000"><strong>Address</strong>: </font><?php echo $row['address'];?></td>
            </tr>
            <tr>
              <td width="439" height="31">&nbsp;<font color="#660000"><strong>PhoneNo</strong> : </font><?php echo $row['phone'];?></td>
              <td width="394">&nbsp;<font color="#660000"><strong>Date Of Birth</strong>: </font><?php echo $row['dob'];?></td>
            </tr>
            <tr>
              <td width="439" height="35">&nbsp;<font color="#660000"><strong>Agent Name</strong> : </font><?php echo $row['aname'];?></td>
              <td width="394">&nbsp;</td>
            </tr>
           </table>
           <hr size="5" width="1000" color="#FF6666"/>           </td>
          </tr>
        <?php

 }?>
        <tr>
          <td colspan="2" class="bg-danger">
            <input type="submit" class="btn btn-group-lg btn-info btn-block" name="Delete" id="Delete" value="Delete" />
            <input name="total" type="hidden" id="total" value="<?php echo $n?>"></td>
          <td width="402" class="bg-danger"></td>
          <td width="539" class="bg-danger"></td>
          </tr>
      </table>
        </form>    </td>
  </tr>
 
  <tr>
    <td colspan="2" align="right"><?php include_once("footer.php");?></td>
  </tr>
</table>

</body>
</html>
