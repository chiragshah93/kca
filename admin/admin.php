<?php
session_start();
include("cn.php");
include("common.php");
checklogin();
$sql_02=mysql_query("select total from transaction");
		$tot = 0;
		
		while($com = mysql_fetch_array($sql_02))
		{
			$tot += $com['total']; 
		}
$sql_01=mysql_query("select * from client");
$count=mysql_num_rows($sql_01);
$sql_03=mysql_query("select * from agent");
$count1=mysql_num_rows($sql_03);

?>
<?php if(isset($_POST['logout']))
		{
			session_destroy();
			header("Location:index.php");
		}
	?>
    

<html>
<head>
 <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
<table width="1000" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="4" align="right"><form name="form2" method="post">
        <label>
          <?php echo $_SESSION['name'];?>
            <input name="logout" type="submit" id="logout" value="logout" />
        </label>
       
      </form></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><?php include_once("logo.php")?></td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="FF6666"><?php include_once("agentmenu.php"); ?></td>
  </tr>
  <tr>
    <td colspan="4">
    <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
</ul>    </td>
  </tr>
  <tr><td colspan="4" class="bg-danger" align="center"><h1>Reports</h1></td>
  	</tr>
    <tr class="bg-success"><td colspan="4"><h3>Date Wise Order Report</h3></td>
  	</tr>
    <td colspan="4">
      <table width="1000" border="0" cellspacing="0" cellpadding="0"><form name="form1" method="post" action="pdf/order_report.php">
        <tr>
          <td width="101"><h3>Date</h3></td>
          <td width="129"><input name="rep" type="date" id="rep" value="" placeholder="Enter StartDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
          <td width="82" align="center"><h3>To</h3></td>
          <td width="183"><input name="rep1" type="date" id="rep1" value="" placeholder="Enter EndDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
          <td width="212" align="center"><input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="PRINT"></td>
        </tr>
     </form>
      </table>  
      
      
</td>
  </tr>
  
    <tr class="bg-success">
      <td height="34" align="left" valign="top"><h3>Order Reports </h3></td>
      <td height="34" align="left" valign="top"><form name="form3" action="pdf/transaction_report.php"><input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="PRINT">
    </td>
      <td align="center" valign="bottom"><h3>Total Collection</h3></td>
      <td align="left" valign="bottom">
        <label>
          <input type="text" name="textfield" id="textfield" value="<?php echo $tot;?>" readonly="readonly">
        </label>
      </form>
      </td>
    </tr>
  <tr>
    <td width="200" height="34" align="left" valign="top"><h3>Agent Reports </h3></td>
    <td width="200" align="left" valign="bottom"><form name="form2" action="pdf/agent_report.php"><input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="PRINT">
    </td>
    <td width="200" align="center"><h3>Total Agent </h3></td>
    <td width="200" align="left" valign="bottom">
      <label>
        <input type="text" name="textfield2" id="textfield2" value="<?php echo $count1;?>"  readonly="readonly">
        </label>
    </form>
    </td>
  </tr>
   <tr class="bg-danger">
    <td width="200" height="34" align="left" valign="top"><h3>Client Reports</h3></td>
    <td width="200" align="left" valign="bottom"><form name="form6" action="pdf/client_report.php"><input type="submit" name="submit" class="btn btn-group-sm btn-info btn-block" value="PRINT"></td>
    <td width="200" align="center" valign="top"><h3>Total Client</h3></td>
    <td width="200" align="left" valign="bottom">
      <label>
        <input type="text" name="textfield3" id="textfield3" value="<?php echo $count;?>"  readonly="readonly">
        </label>
    </form>
    </td>
  </tr>
  <tr>
    <td colspan="4" align="right"><?php include_once("footer.php");?></td>
  </tr>
</table>

</body>
</html>