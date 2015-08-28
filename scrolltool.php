<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {
	font-family: "Comic Sans MS";
	font-size: 24px;
}
-->
</style>
</head>

<body>
<table width="150" border="0" cellspacing="0" cellpadding="0" height="100%" align="center">
 <tr>
  
  <th bgcolor="#FBA61A"><h2 class="style2">Testimonial</h2></th>
 </tr>
  <tr align="right">
  
    <td height="192"><marquee  style="font-size:medium ; font-style:normal; font-variant:small-caps" behavior="scroll" speed="slow" direction="up" scrollamount="4">
	<p>
	  <?php $result = mysql_query("Select * From feedback where status='1'",$link);
	while($row = mysql_fetch_array($result))
{

	$username = $row['username'];
	$comment = $row['comment'];
	$status=$row['status'];
	$date_time=$row['date_time'];
	echo "<blockquote class=blockquote-reverse><p>";
	echo $username;
	echo " : ";
	
	echo "say on-";
	echo $date_time;
	echo "<footer>";
	echo "' ";
	echo $comment;
	echo " !'";
	echo "<br>";
	echo "</footer></p>";
	echo "</blockquote>";
	echo "<hr size=3 color=#FF6666>";
	echo "<br>";
	}
	  ?>
	  </p>
	
    </marquee></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FBA61A"><h2 align="center" class="style2">News</h2></td>
  </tr>
  <tr>
  
    <td valign="top"><marquee style="font-size:medium" behavior="scroll" speed="slow" direction="up"><img src="a.png" />
              	<br>
              	Sandwich Keeper Plus(new):
                  <br>The Sandwich Keeper Is a One Piece Wonder And Comes...
                  <br><img src="c.png" />
                  <br>Snack N Stack:
                  <br>Perfect to Gift Sweets And Savories This Holly To Your Loved Once In This Multi Purpose Products...
                  <br><img src="d.png" />
                  <br>Bell Flower Dinner Set:
                  <br>Bring Home This Mo
    </marquee></td>
 </td>
  </tr>
</table>
</body>
</html>
