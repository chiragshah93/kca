<?php
session_start();
include("cn.php");
include("common.php");
checklogin();


$msg = "";
$eid = "";
$username = "";
$name = "";
$address = "";
$phone = "";
$dob = "";
$adminid="";
$doj="";
$password="";


if(isset($_POST['submit']))
{
	
	$eid = $_POST['eid'];
	$username = $_POST['username'];
	$name= $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$dob = $_POST['dob'];
	$adminid=$_POST['adminid'];
	$doj=$_POST['doj'];
	$password=$_POST['password'];
	$result = mysql_query("Update agent set eid='$eid',  name='$name', address='$address', phone='$phone', dob='$dob', adminid='$adminid' ,doj='$doj',password='$password',username='$username' where aid=".$_GET['aid']);
		$msg = "Record is updated";
	
	
}
if(isset($_GET['aid']))
{
	$result = mysql_query("Select * From agent where aid=".$_GET['aid'],$link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$eid = $row['eid'];
	$username = $row['username'];
	$name = $row['name'];
	$address = $row['address'];
	$phone = $row['phone'];
	$dob = $row['dob'];
	$adminid=$row['adminid'];
	$doj=$row['doj'];
	$password=$row['password'];
	
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
</style><title>Welcome to the KCA ...</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body class="warning">

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
    <tr align="center">
      
      <td width="851"><form name="form1" method="post" action=""><table width="1000" border="0" cellspacing="0" cellpadding="2" align="center" class="table table-striped">
  <tr>
    <td colspan="4" align="left">
    <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Main<span class="divider">&raquo;</span></li>
<li>My Agent<span class="divider">&raquo;</span></li>
<li>Update</li>
</ul>
    </td>
  </tr>
  <tr class="danger">
    <td colspan="4" align="center">
      <h2>AGENT </h2>   </td>
    </tr>
  <tr class="warning">
    <td width="115"><div align="left">Agent ID</div></td>
    <td width="146"><input type="text" value="<?php echo $eid?>" name="eid"></td>
    <td width="120"><div align="left">Admin ID</div></td>
    <td width="150"><input type="text" value="<?php echo $adminid?>" name="adminid"></td>
  </tr>
  <tr class="success">
    <td><div align="left">Name</div></td>
    <td><input type="text" value="<?php echo $name?>" name="name"></td>
    <td><div align="left">Address</div></td>
    <td><textarea name="address" id="address" cols="21" rows="2" value="<?php echo $address;?>"></textarea></td>
  </tr>
  <tr class="warning">
    <td><div align="left">Username</div></td>
    <td><input type="text" value="<?php echo $username?>" name="username"></td>
    <td><div align="left">Password</div></td>
    <td><input type="text" value="<?php echo $password?>" name="password"></td>
  </tr>
  <tr class="success">
    <td><div align="left">Date Of Joining</div></td>
    <td><input type="text" value="<?php echo $doj?>" name="doj"></td>
    <td><div align="left">Date Of Birth</div></td>
    <td><input type="text" value="<?php echo $dob?>" name="dob"></td>
  </tr>
  <tr class="warning">
    <td>Phone</td>
    <td><input type="text" value="<?php echo $phone?>" name="phone"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="success">
    <td colspan="4"><div align="left"><input type="submit" name="submit" id="submit" value="submit" /></div></td>
    </tr>
 
  
</table>
</form></td>
    </tr>
    <tr>
    
      <td colspan="2" align="right"><?php include_once("footer.php");?>        </td>
    </tr>
  </table>

</body>
</html>