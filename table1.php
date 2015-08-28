<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>

</head>

<body>
<div class="span2">
    <table class="table table-striped">
      <thead>
        <tr>
          <th width="14%">Agent Id</th>
          <th width="14%">Client Id</th>
          <th width="14%">Name</th>
          <th width="14%">Address</th>
          <th width="15%">Phone</th>
          <th width="15%">Date Of Birth</th>
          <th width="14%">Agent Name</th>
        </tr>
      </thead>
      <tbody>
          <tr>
          <td><input name="eid" type="text" id="eid" value="<?php echo $eid?>"></td>
          <td><input name="cid" type="text" id="cid" value="<?php echo $cid?>"></td>
          <td><input name="name" type="text" id="name" value="<?php echo $name?>" placeholder="Enter ClientName" pattern="[A-Za-z]{3,10}" maxlength="20" required/><font color="#FF0000" size="+2"><strong>*</strong></font></td>
          <td><input name="address" type="text" id="address" value="<?php echo $address?>"  placeholder="Enter Address"  maxlength="100" required/><font color="#FF0000" size="+2"><strong>*</strong></font></td>
        <td><input name="phone" type="text" id="phone" value="<?php echo $phone?>" placeholder="Enter Mobileno" pattern="[0-9]{10,10}" autocomplete="off"  maxlength="10" required/><font color="#FF0000" size="+2"><strong>*</strong></font>
        </td>
        <td><input name="dob" type="date" id="dob" value="<?php echo $dob?>" placeholder="Enter ClientBirthDate" pattern="^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$" required/><font color="#FF0000" size="+2"><strong>*</strong></font>
        </td>
        <td>
        <input name="aname" type="text" id="aname" value="<?php echo $aname?>">
        </td>
        </tr>
        <tr>
        <td colspan="7" align="center"><button class="btn btn-large btn-primary" type="submit" name="Submit" value="Submit" >Submit</button></td>
        </tr>
      </tbody>
    </table>
  </div>


</body>
</html>
