<?php session_start(); include( "cn.php"); $msg="" ; if(isset($_POST[ 'submit'])) { $name=$_POST[ 'name']; $pass=$_POST[ 'pass']; $result=mysql_query( "select * from admin where name='$name'",$link); if(mysql_num_rows($result)>
0) { $row=mysql_fetch_array($result,MYSQL_BOTH); if ($pass==$row["pass"]) { $_SESSION['submit']="ok"; $_SESSION['name']=$name; header("location:admin.php"); } else { $msg="Password incorrect"; } } else { $msg="Username incorrect"; } } ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <style type="text/javascript">
        window.onload function(){
        <?php session_start(); if($_SESSION[ 'login']="" ) header( "Location:login.php"); ?> }
    </style>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Welcome to the KCA ...</title>
    <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

</head>

<body>
    <table width="1000" height="235" border="0" align="center" class="shadow1">
        <tr>
            <td colspan="2" align="right">
                <?php include( "logo.php"); ?> </td>
        </tr>
        <tr>
            <td width="314">
                <h1 align="center"><img src="admin.jpg"></h1>
            </td>
            <td width="1019">
                <form action="" method="post">
                    <div class="container" style="width:80%;">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="login-panel panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Please Sign In</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <fieldset>

                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Enter name" name="name" type="text" autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Enter Password" name="pass" type="password" value="">
                                                </div>

                                                <!-- Change this to a button or input when using this as a form -->
                                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </center>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                <?php include( "footer.php"); ?> </td>
        </tr>
    </table>
</body>

</html>
