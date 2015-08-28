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

<body>


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
    <td colspan="4"><?php include_once("agentmenu.php");?></td>
  </tr>
  <tr>
    <td colspan="2">
    <ul class="breadcrumb">
<li>Home<span class="divider">&raquo;</span></li>
<li>View<span class="divider">&raquo;</span></li>
<li>Agent<span class="divider">&raquo;</span></li>

</ul>
    </td>
  </tr>
  <tr>
    <td colspan="2"><form id="form1" name="form1" method="post" action="">
      <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
        <tr class="bg-danger">
          <td width="725" colspan="3" align="center"><font color="#660000" size="7">Agent</font></td>
          </tr>
         
        
        <tr>
          <td><table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFCCCC">
            <tr>
              <td colspan="2"><label>
                  
    
                    <div align="center" ></div>
                  </label></td>
            </tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
            </table>
            
 <?php

// how many rows to show per page
$rowsPerPage = 1;

// by default we show first page
$pageNum = 1;

// if $_GET['page'] defined, use it as page number
if(isset($_GET['page']))
{
	$pageNum = $_GET['page'];
}

// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;

$query  = "SELECT * FROM agent LIMIT $offset, $rowsPerPage";
$result = mysql_query($query) or die('Error, query failed');

// print the random numbers
while($row = mysql_fetch_array($result))
{
	print "<table width=800 border=0 align=center cellpadding=0 cellspacing=0 bgcolor=#FFCCCC >
	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
	<td><font color=#660000>Name:</font>"; echo @$row['name']; print"</td>
		<td><font color=#660000>Address:</font>"; echo @$row['address'];print"</td>
	</tr>
	<tr>
		<td><font color=#660000>Agent ID:</font>";echo @$row['eid'];print"</td>
		<td><font color=#660000>Phone:</font>";echo @$row['phone'];print"</td>
	</tr>
	<tr>
		<td><font color=#660000>Usename:</font>";echo @$row['username'];print"</td>
		<td><font color=#660000>Password:</font>"; echo @$row['password'];print"</td>
	</tr>
	
	<tr>
		<td><font color=#660000>Admin ID:</font>";echo @$row['adminid'];print"</td>
		<td><font color=#660000>Date Of Joining:</font>"; echo @$row['doj'];print"</td>
		
	</tr>

<tr>
	
		<td><font color=#660000>Date Of Birth:</font>"; echo @$row['dob'];print"</td>
		<td>
		</td>
	</tr>
</table>";
		
}
// how many rows we have in database
$query   = "SELECT COUNT(name) AS numrows FROM agent";
$result  = mysql_query($query) or die('Error, query failed');
$row     = mysql_fetch_array($result, MYSQL_ASSOC);
$numrows = $row['numrows'];

// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage);

// print the link to access each page
$self = $_SERVER['PHP_SELF'];
$nav = '';
for($page = 1; $page <= $maxPage; $page++)
{
	if ($page == $pageNum)
	{
		$nav .= " $page ";   // no need to create a link to current page
	}
	else
	{
		$nav .= " <a href=\"$self?page=$page\">$page</a> ";
	}
}

// creating previous and next link
// plus the link to go straight to
// the first and last page

if ($pageNum > 1)
{
	$page = $pageNum - 1;
	$prev = " <a href=\"$self?page=$page\">[Prev]</a> ";

	$first = " <a href=\"$self?page=1\">[First Page]</a> ";
}
else
{
	$prev  = '&nbsp;'; // we're on page one, don't print previous link
	$first = '&nbsp;'; // nor the first page link
}

?>
<center>
<?php
if ($pageNum < $maxPage)
{
	$page = $pageNum + 1;
	$next = " <a href=\"$self?page=$page\">[Next]</a> ";

	$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
}
else
{
	$next = '&nbsp;'; // we're on the last page, don't print next link
	$last = '&nbsp;'; // nor the last page link
}

// print the navigation link
echo $first . $prev . $nav . $next . $last;

// and close the database connection

    
    ?>
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
