<?php
session_start();
include("cn.php");
include("common.php");
checklogin();

if(isset($_POST['submit']))
{
	      $aname=$_SESSION['name'];
			$cname = $_POST['codelist'];
		   $description = $_POST['description'];
	       $price = $_POST['select1'];
		   $qty = $_POST['select2'];
		   $total = $_POST['txtDisplay'];
		   		   $date=$_POST['date'];
		   $order_status = $_POST['status'];
		   $result = mysql_query("Insert into transaction(adminname,clientname,description,price,qty,total,date,order_status) values('$aname','$cname','$description','$price','$qty','$total','$date','$order_status')");
		   $msg = "New record is saved";
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
-->
</style><title>Welcome to the KCA ...</title>
<script type="text/javascript" language="Javascript">
	var sum=0;
	price = document.frmOne.select1.value;
	document.frmOne.txtDisplay.value = price;
    function OnChange(value){
		
		price = document.frmOne.select1.value;
		quantity = document.frmOne.select2.value;
        sum = price * quantity;
		
		document.frmOne.txtDisplay.value = sum;
    }
	
</script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>
<body>

  <table width="1000" border="0" cellspacing="5" cellpadding="0" align="center">
    <tr>
      <td align="right"><form name="form2" method="post" action="">
        <?php echo $_SESSION['name'];?>
            <input name="logout" type="submit" id="logout" value="logout" />
      </form>
        <p>
          <?php include_once("logo.php");?>
          </td>
    </tr>
    <tr><td colspan="3" bgcolor="#FF6666"><?php include_once("agentmenu.php");?>
     </td></tr>
    <tr>
      <td>
      <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>Order</li>
</ul>
      </td>
    </tr>
    <tr>
      <td>
      <form NAME ="frmOne" action="" method="post">
        <div class="span8">
<table class="table table- striped">
<thead>
<tr class="bg-danger">
<th colspan="3" align="center"><h1>Order Form</h1></th>
</tr>
<thead>
<tr>
<td colspan="2">Admin Name:</td>
<td width="72%"> <input type="text" name="name" placeholder="enter name" required value="<?php echo $_SESSION['name'];?>"  readonly="readonly"/></td>
</tr>
<tr>
            <td colspan="2">Client Name:</td>
            <td><label>
              <?php include("dropdown.php"); ?>
            </label></td>
          </tr>
<tr>
            <td colspan="2">Description:</td>
            <td><label>
              <textarea name="description" id="description" cols="45" rows="5"></textarea>
            </label></td>
          </tr>
<tr>
            <td colspan="2">Date:</td>
            <td><label>
              <input name="date" type="date" id="date" value="" placeholder="Enter AgentJoinDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/><font color="#FF0000" size="+2"><strong>*</strong></font>
            </label></td>
          </tr>
          <tr>
            <td colspan="2">Price:</td>
            <td><label>
              <INPUT TYPE = "Text" name = "select1"  value ="0" style="border:#999999 solid 1px; background-color:#FFF; height:20px;">
            </label></td>
          </tr>
          <tr>
            <td colspan="2">Quantity:</td>
            <td><select name="select2"  onchange='OnChange(this.value)' style="border:#999999 solid 1px; background-color:#FFF; width:40px; height:20px;">
            <option value="-">-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select></td>
          </tr>
          <tr>
            <td colspan="2">Total:</td>
            <td><label>
              <INPUT TYPE = "Text" id="txtDisplay" onBlur='Onfocus(this.value)' name = "txtDisplay"  value ="" style="border:#999999 solid 1px; background-color:#FFF; height:20px;" readonly>
            </label></td>
          </tr>
          <tr>
            <td colspan="2">Status:</td>
            <td><label></label>
              <label>
              <select name="status" id="status">
              	<option name="pending">Pending</option>
                <option value="complete">Complete</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td><div align="center">
              <label>
              <input type="submit" name="submit" class="btn btn-group-lg btn-info btn-block" value="submit">
              </label>
            </div></td>
            <td width="2%">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
</table>
</div>

      </form></td>
    </tr>
    <tr>
    
      <td align="right"><?php include_once("footer.php");?>        </td>
    </tr>
  </table>

</body>
</html>