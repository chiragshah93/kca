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

<blockquote>&nbsp;</blockquote>
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
<li>Search<span class="divider">&raquo;</span></li>
<li>Agent</li>
</ul>
    </td>
  </tr>
  
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="973" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr class="bg-danger">
          <td width="973" colspan="3" align="center" class="bg-danger"><font color="#660000"><h1>Agent</h1></font></td>
          </tr>
         
        
        <tr>
          <td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
             <h3> <td colspan="2" align="center"><label>
                  <font color="#660000"></font><font color="#660000">Agent Name:</font>
                      <input type="text" name="key" class="input-medium search-query" />
                      <input type="submit" name="search" id="search" value="search" />                  
                                      </label></td>
            </h3></tr>
             
            </table>
           <table class="table table-striped">
<thead>
<tr>
<th width="5%" valign="top">AID</th>
<th width="9%">ADMIN ID</th>
<th width="7%">NAME</th>
<th width="10%">ADDRESS</th>
<th width="8%">PHONE</th>
<th width="11%">USERNAME</th>
<th width="10%">PASSWORD</th>
<th width="9%">AGENT ID</th>
<th width="16%">DATE OF JOINING</th>
<th width="15%">DATE OF BIRTH</th>
</tr>
</thead>
<tbody>
<?php
if(isset($_POST['search']))
{
$key=$_POST['key'];  

$query = "SELECT * FROM agent WHERE name LIKE '%$key%' ";   
$result = mysql_query($query);
if(empty($_POST['key']))
{
echo "not found";
}


else
{
	while($row = mysql_fetch_array($result))
   { 
   	$aid=$row['aid'];
	$adminid=$row['adminid'];
	$name=$row['name'];
	$address=$row['address'];
	$phone=$row['phone'];
	$username=$row['username'];
	$password=$row['password'];
	$eid=$row['eid'];
	$doj=$row['doj'];
	$dob=$row['dob'];
?>
<tr>
	<td><?php echo $aid; ?></td>
    <td><?php echo $adminid; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $address; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $username; ?></td>
    <td><?php echo $password; ?></td>
    <td><?php echo $eid; ?></td>
    <td><?php echo $doj; ?></td>
    <td><?php echo $dob; ?></td>
    </tr>
<?php }}}?>
</tbody>
</table>
 
          </tr>
     
              </table>
        </form>    </td>
  </tr>
  <tr>	
    <td colspan="2"><?php include_once("footer.php");?></td>
  </tr>
</table>

</body>
</html>
