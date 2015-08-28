<?php
session_start();
include("cn.php");
include("common.php");
checklogin();


$msg = "";
$eid = "";
$cid = "";
$name = "";
$address = "";
$phone = "";
$dob = "";
$adminid="";
$aname="";



if(isset($_POST['submit']))
{
	
	$eid = $_POST['eid'];
	$cid = $_POST['cid'];
	$name= $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$adminid=$_POST['adminid'];
	$aname=$_POST['aname'];
	$result = mysql_query("Update client set eid='$eid',  clientname='$name', address='$address', phone='$phone', dob='$dob', adminid='$adminid' ,aname='$aname' where cid=".$_GET['cid']);
		$msg = "Record is updated";
	
	
}
if(isset($_GET['cid']))
{
	$result = mysql_query("Select * From client where cid=".$_GET['cid'],$link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$eid = $row['eid'];
	$cid = $row['cid'];
	$name = $row['clientname'];
	$address = $row['address'];
	$phone = $row['phone'];
	$dob = $row['dob'];
	$adminid=$row['adminid'];
	$aname=$row['aname'];
	
}
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
	?>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
-->
</style><title>Welcome to the KCA ...</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>

  <table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td colspan="2" align="right"><form name="form2" method="post" action="">
       <?php echo $_SESSION['name'];?>
            <input name="logout" type="submit" id="logout" value="logout" />
                 </form>
        <p>
          <?php include_once("logo.php");?>
          </td>
    </tr>
    <tr><td colspan="4" bgcolor="#FF6666"><?php include_once("agentmenu.php");?>
     </td></tr>
    <tr>
      
      <td width="851" align="center"><form name="form1" method="post" action=""><table width="500" border="0" cellspacing="0" cellpadding="2" align="center" class="table table-striped">
  <tr>
    <td colspan="4" align="left">
    <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Main<span class="divider">&raquo;</span></li>
<li>My Client<span class="divider">&raquo;</span></li>
<li>Update</li>
</ul>
    </td>
  </tr>
  <tr class="danger">
    <td colspan="4" align="center">
      <h2>Client</h2>    </td>
    </tr>
  <tr class="warning">
    <td width="98"><div align="left">Agent ID</div></td>
    <td width="145"><input type="text" value="<?php echo $eid?>" name="eid"></td>
    <td width="115"><div align="left">Client ID</div></td>
    <td width="132"><input type="text" value="<?php echo $cid?>" name="cid"></td>
  </tr>
  <tr class="success">
    <td><div align="left">Name</div></td>
    <td><input type="text" value="<?php echo $name?>" name="name"></td>
    <td><div align="left">Address</div></td>
    <td><textarea name="address" id="address" cols="21" rows="2" value="<?php echo $address;?>"></textarea></td>
  </tr>
  <tr class="warning">
    <td><div align="left">Phone</div></td>
    <td><input type="text" value="<?php echo $phone?>" name="phone"></td>
    <td><div align="left">Date Of Birth</div></td>
    <td><input name="dob" type="date" id="dob" value="<?php echo $dob ?>" placeholder="Enter AgentBirthDate" pattern="^\d{4}-

((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
  </tr>
  <tr class="success">
    <td><div align="left">Admin ID</div></td>
    <td><input type="text" value="<?php echo $adminid?>" name="adminid"></td>
    <td><div align="left">Agent Name</div></td>
    <td><input type="text" value="<?php echo $aname?>" name="aname"></td>
  </tr>
  <tr class="warning">
    <td colspan="4"><div align="left"><input type="submit" name="submit" id="submit" value="submit" /></div></td>
    </tr>
  
</table>
</form></td>
    </tr>
    <tr>
    
      <td colspan="2" align="right"><?php include_once("footer.php");?>                </td>
    </tr>
  </table>

</body>
</html>