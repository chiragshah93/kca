

<htm>
<body>
<table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
  <form id="form1" name="form1" method="post" action="">
  <tr class="bg-danger">
    <td align="center"><h1>Agent Inquiry</h1></td>
  </tr>
  <tr>
  <td><div align="center" ><font color="#660000"></font><font color="#660000">Near By:</font>
                      <input type="text"  name="key" />
                      <input type="submit" name="search" id="search" value="search" />                  
                    </div></td>
 
  </tr>
  <tr>
    <td><div class="span2">
    <table width="100%" class="table table-striped">
      <thead>
        <tr class="info">
          <th width="14%" class="info">Agent Id</th>
          <th width="14%" class="info">Name</th>
          <th width="14%" class="info">Address</th>
          <th width="14%" class="info">Phone</th>
                  </tr>
      </thead>

<?php
if(isset($_POST['search']))
{
if(preg_match('/^[A-Za-z ]{1,25}$/',$_POST['search']))
{
$key=$_POST['key'];  


$query = "SELECT aid,name,address,phone,eid FROM agentinqury WHERE address LIKE '%$key%' ";   
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
	$name=$row['name'];
	$address=$row['address'];
	$phone=$row['phone'];
	$eid=$row['eid'];
?>
<tr>
	
    <td><?php echo $eid; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $address; ?></td>
    <td><?php echo $phone; ?></td>
    </tr>
<?php }}}}?>
</table></div></td>
  </tr>
</form>
</table>
</body>
</html>