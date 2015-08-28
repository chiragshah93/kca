<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.js"></script>

</head>

<body>
<div class="span2">
    <table width="53%" class="table table-striped">
      <tr class="info">
        <td width="12%">Agent ID</td>
    <td width="32%"><input name="eid" type="text" id="eid" value="<?php echo $eid?>"></td>
    <td width="14%">Admin ID</td>
    <td width="42%" ><input name="adminid" type="text" id="adminid" value="<?php echo $adminid?>"></td>
      </tr>
      <tr class="info">
        <td width="12%">Name</td>
        <td width="32%"><input name="name" type="text" id="name" value="<?php echo $name?>" placeholder="Enter AgentName" pattern="[A-Za-z]{3,10}" maxlength="20" required/></td>
    <td width="14%">Address</td>
    <td width="42%" ><input name="address" type="text" id="address" value="<?php echo $address?>" placeholder="Enter Address"  maxlength="100" required/></td>
      </tr> 
      <tr class="info">
        <td width="12%">Username</td>
        <td width="32%"><input name="username" type="text" id="username" value="<?php echo $username?>"></td>
    <td width="14%">Password</td>
    <td width="42%" ><input name="password" type="text" id="password" value="<?php echo $password?>"></td>
      </tr>
      <tr class="info">
        <td width="12%">Date Of Joining</td>
        <td width="32%"><input name="doj" type="date" id="doj" value="<?php echo $doj ?>" placeholder="Enter AgentJoinDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
    <td width="14%">Date Of Birth</td>
    <td width="42%" ><input name="dob" type="date" id="dob" value="<?php echo $dob ?>" placeholder="Enter AgentBirthDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/></td>
      </tr>
      <tr class="info">
        <td width="12%">Phone</td>
        <td width="32%"><input name="phone" type="text" id="phone" value="<?php echo $phone?>" placeholder="Enter Mobileno" pattern="[0-9]{10,10}" autocomplete="off"  maxlength="10" required/></td>
      </tr>
      <tr class="info">
        <td colspan="4" align="center"><input type="submit" name="submit" value="submit"></td>
    </tr>     
        </table>
</body>
</html>
