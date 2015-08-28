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
<form NAME = "frmOne" action="initiateorder.php" method="post">
Price:<br><INPUT TYPE = "Text" name = "select1" size = "35" value ="1" style="border:#999999 solid 1px; background-color:#FFF; width:40px; height:20px;"><br>
Quantity:<br><select name="select2" onchange='OnChange(this.value)' style="border:#999999 solid 1px; background-color:#FFF; width:40px; height:20px;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select><br>
Result:<br>
<INPUT TYPE = "Text" name = "txtDisplay" size = "35" value ="" style="border:#999999 solid 1px; background-color:#FFF; width:40px; height:20px;" readonly><br><br>
</form>