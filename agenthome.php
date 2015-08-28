 
<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
?>

<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:login.php");
		}
		$aname=$_SESSION['username'];
		$sql_01=mysql_query("select * from client where aname='$aname' ");
		$count=mysql_num_rows($sql_01);
		$sql_02=mysql_query("select com from transaction where agentname='$aname'");
		$tot_com = 0;
		
		while($com = mysql_fetch_array($sql_02))
		{
			$tot_com += $com['com']; 
		}
		$sql_03=mysql_query("select qty from transaction where agentname='$aname'");
		$unit= 0;
		while($qty = mysql_fetch_array($sql_03))
		{
			$unit += $qty['qty']; 
		}
		
?>
	<style type="text/css">
<!--
body {
	background-image: url(abc.gif);
}
-->
</style>

<title>Welcome to the KCA ...</title><form action="" method="post">
  <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="363"><p align="center"></td>
    </tr>
    <tr>
      <td colspan="2"><?php include_once("logo.php")?></td>
    </tr>
    
    <tr>
      <td colspan="2" bgcolor="#FF6666"><?php include_once("agentmenu1.php"); ?></td>
    </tr>
    <tr>
      <td colspan="2"><ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
</ul></td>
    </tr>
     <tr>
      <td valign="top">
        <table>
      <tr>
    <td width="243" valign="top"><div align="center">Total No. Of Clients</div></td>
    <td width="147"><label>
      <input type="text" value="<?php echo $count;?>"  readonly="readonly">
    <input name="total" type="hidden" id="total">
    </label></td>
  </tr>
  <tr>
    <td><div align="center">Total Commission</div></td>
    <td><label>
      <input type="text" name="textfield2" id="textfield2" value="<?php echo $tot_com;?>" readonly="readonly">
    </label></td>
  </tr>
  <tr>
    <td><div align="center">Total No. of Units Sold</div></td>
    <td><label>
      <input type="text" name="textfield2" id="textfield2" value="<?php echo $unit;?>" readonly="readonly">
    </label></td>
  </tr>
  </table></td>
      <td width="637"><img src="banner03.jpg" width="715" height="244" /></td>
    </tr>
    <tr>
      <td colspan="2" align="right"><?php include_once("footer.php");?></td>
    </tr>
  </table>
</form>