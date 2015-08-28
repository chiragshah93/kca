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
    <td colspan="2">    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><?php include_once("agentmenu.php");?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
        <tr>
          <td width="725" colspan="3" align="center"><font color="#660000" size="5">Client</font></td>
          </tr>
         
        
        <tr>
          <td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
            <tr>
              <td colspan="2"><label>
                  
    
                    <div align="center" ><font color="#660000">Client Name:</font>
                      <input type="text" name="key" />
                      <input type="submit" name="search" id="search" value="search" />                  
                    </div>
                  </label></td>
            </tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            </table>
           <table border="0" align="center" cellpadding="10" cellspacing="5"><hr>
<tr bgcolor="#FF4A4A"><th><font color="#FFFFFF">Agent ID</font></th><th><font color="#FFFFFF">Client ID</font></th><th><font color="#FFFFFF">NAME</font></th><th><font color="#FFFFFF">ADDRESS</font></th><th><font color="#FFFFFF">PHONE</font></th><th><font color="#FFFFFF">Agent Name</th>
<th><font color="#FFFFFF">Date Of Birth</th><th><font color="#FFFFFF">Admin ID</th></tr>

<?php
if(isset($_POST['search']))
{
$key=$_POST['key'];  

$query = "SELECT * FROM client WHERE name LIKE '%$key%' ";   
$result = mysql_query($query);
if(empty($_POST['key']))
{
echo "not found";
}


else
{
	while($row = mysql_fetch_array($result))
   { 
   	$eid=$row['eid'];
	$cid=$row['cid'];
	$name=$row['clientname'];
	$address=$row['address'];
	$phone=$row['phone'];
	$aname=$row['aname'];
	$adminid=$row['adminid'];
	$dob=$row['dob'];
?>
<tr>
	<td><?php echo $eid; ?></td>
    <td><?php echo $cid; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $address; ?></td>
    <td><?php echo $phone; ?></td>
    <td><?php echo $aname; ?></td>
    <td><?php echo $dob; ?></td>
    <td><?php echo $adminid; ?></td>
   
</tr>
<?php }}}?>
</table>
 
 
          </tr>
     
        <tr>
          <td align="center">&nbsp;</td>
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
