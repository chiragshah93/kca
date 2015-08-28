<?php
session_start();
include("cn.php");
include("common.php");
checklogin();


$msg = "";
$name = "";
$address = "";
$phone = "";
$username = "";
$password = "";
$eid = "";
$doj = "";
$dob = "";
$adminid="";



if(isset($_POST['submit']))
{
	$eid=$_POST['eid'];
	$adminid=$_POST['adminid'];
	$name=$_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$doj = $_POST['doj'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	if(!isset($_GET['aid']))
	{
		if(empty($msg1))
		{
		$result = mysql_query("Insert into agent(adminid,name,address,phone,username,password,eid,doj,dob) values('$adminid','$name','$address','$phone','$username','$password','$eid','$doj','$dob')");
		$msg = "New record is saved";
		}
		}
	
}
if(isset($_GET['aid']))
{
	$result = mysql_query("Select * From agent where aid=".$_GET['aid'],$link);
	$row = mysql_fetch_array($result, MYSQL_BOTH);
	$name = $row['name'];
	$adminid=$row['adminid'];
	$address = $row['address'];
	$phone = $row['phone'];
	$username = $row['username'];
	$password = $row['password'];
	$eid = $row['eid'];
	$doj = $row['doj'];
	$dob = $row['dob'];
	
}
?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
	?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>

  
  <p>&nbsp;</p>
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="5" class="shadow1">
    <tr>
      <td align="right"><form name="form2" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
        <label>
          <?php echo $_SESSION['name'];?>
            <input name="logout" type="submit" id="logout" value="logout" />
        </label>
       
      </form>
        <p>
          <?php include_once("logo.php");?>
      </td>
    </tr>
    <tr><td colspan="3" bgcolor="#FF6666"><?php include_once("agentmenu.php");?>
     </td></tr>
    <tr>
      <td align="left" valign="top">
      <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Main<span class="divider">&raquo;</span></li>
<li>My Agent<span class="divider">&raquo;</span></li>
<li>Insert</li>
</ul>      </td>
    </tr>
    <tr class="bg-danger">
      <td align="center" valign="top">
      <form name="form1" method="post" action="">
               <h1>Agent</h1>
        <div class="span2">
    <table class="table table-nonfluid">
            <tr class="warning">
    <td width="98"><div align="left">Agent ID</div></td>
    <td width="145"><input name="eid" type="text" id="eid" value="<?php echo $eid?>"></td>
    <td width="115"><div align="left">Admin ID</div></td>
    <td width="132"><input name="adminid" type="text" id="adminid" value="<?php echo $adminid?>"></td>
  </tr>
  <tr class="success">
    <td><div align="left">Name</div></td>
    <td><input name="name" type="text" id="name" value="<?php echo $name?>" placeholder="Enter AgentName" pattern="[A-Za-z]{3,10}" 

maxlength="20" required/></td>
    <td><div align="left">Address</div></td>
    <td><textarea name="address" id="address" cols="21" rows="2" value="<?php echo $address;?>"></textarea></td>
  </tr>
   <tr class="warning" >
           <td><div align="left">Username</div></td>
      <td><input name="username" type="text" id="username" value="<?php echo $username?>"></td>
      <td><div align="left">Password</div></td>
      <td><input name="password" type="text" id="password" value="<?php echo $password?>"></td>
    </tr>
    <tr class="success">
            <td><div align="left">Date Of Joining</div></td>
      <td ><input name="doj" type="date" id="doj" value="<?php echo $doj ?>" placeholder="Enter AgentJoinDate" pattern="^\d{4}-

((0\d)|(1[012]))-(([012]\d)|3[01])$" required/><font color="#FF0000" size="+2"><strong>*</strong></font></td>
  
    <td><div align="left">Date Of Birth</div></td>
      <td><input name="dob" type="date" id="dob" value="<?php echo $dob ?>" placeholder="Enter AgentBirthDate" pattern="^\d{4}-

((0\d)|(1[012]))-(([012]\d)|3[01])$" required/><font color="#FF0000" size="+2"><strong>*</strong></font></td>
    </tr>
  <tr class="warning">
    <td><div align="left">Phone</div></td>
    <td><input name="phone" type="text" id="phone" value="<?php echo $phone?>" placeholder="Enter Mobileno" pattern="[0-9]{10,10}" autocomplete="off"  maxlength="10" required/></td>
    <td></td>
    <td></td>
  </tr>
  <tr class="danger">
    <td align="center"><input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="submit"></td>
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