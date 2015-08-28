<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$eid = "";
$cid = "";
$name = "";
$address = "";
$phone = "";
$dob = "";
$aname="";
if(isset($_POST['Submit']))
{
	$eid=$_POST['eid'];
	$cid=$_POST['cid'];
	$name=$_POST['clientname'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$aname=$_POST['aname'];	

	$dob = $_POST['dob'];
	
	if(!isset($_GET['cid']))
	{
		$result = mysql_query("Insert into client(eid,cid,clientname,address,phone,dob,aname) values('$eid','$cid','$name','$address','$phone','$dob','$aname')");
		$msg = "New record is saved";
		
	}
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
	$aname=$row['aname'];
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
.table-nonfluid {
   width: 50%;
   table-layout: fixed;
word-wrap: break-word;
}

-->
</style><title>Welcome to the KCA ...</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>

  <table width="1000" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
      <td align="center">
        <p>
          <?php include_once("logo.php");?>
          </td>
    </tr>
    <tr><td colspan="3" ><?php include_once("agentmenu1.php");?>
     </td></tr>
    <tr>
      <td><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Client<span class="divider">&raquo;</span></li>
<li>Insert</li>
</ul></td>
    </tr>
    <tr>
      <td align="center" class="bg-danger"><form name="form1" method="post" action="">
      <h1>Client</h1>
        <div class="span2">
    <table class="table table-nonfluid">
            <tr class="warning">
    <td width="98"><div align="left">Agent ID</div></td>
    <td width="145"><input name="eid" type="text" id="eid" value="<?php echo $eid;?>"></td>
    <td width="115"><div align="left">Client ID</div></td>
    <td width="132"><input name="cid" type="text" id="cid" value="<?php echo $cid?>"></td>
  </tr>
  <tr class="success">
    <td><div align="left">Name</div></td>
    <td><input name="clientname" type="text" id="clientname" value="<?php echo $name?>" placeholder="Enter ClientName" pattern="[A-Za-z]{3,10}" maxlength="20" required/></td>
    <td><div align="left">Address</div></td>
    <td><textarea name="address" id="address" cols="21" rows="2"></textarea></td>
  </tr>
  <tr class="warning">
    <td><div align="left">Phone</div></td>
    <td><input name="phone" type="text" id="phone" value="<?php echo $phone?>" placeholder="Enter Mobileno" pattern="[0-9]{10,10}" autocomplete="off"  maxlength="10" required/></td>
    <td><div align="left">Date Of Birth</div></td>
    <td><input name="dob" type="date" id="dob" value="<?php echo $dob?>" placeholder="Enter ClientBirthDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
  </tr>
  <tr class="success">
    <td><div align="left">Agent Name</div></td>
    <td><input name="aname" type="text" id="aname" value="<?php echo $_SESSION['username'];?>" readonly></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td align="center" class="bg-danger"><input type="submit" name="Submit" class="btn btn-group-sm btn-info btn-block" value="Submit"></td>
    </tr>
    </table>
  </div>
</div>

        </form></td>
    </tr>
    <tr>
    
      <td align="right"><?php include_once("footer.php");?>        </td>
    </tr>
  </table>

</body>
</html>