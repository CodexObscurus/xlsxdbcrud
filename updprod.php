<?php
	include 'cnct.php';
	$itemid = $_POST["itemid"];
	$sql = "SELECT * FROM `product_tbl` WHERE P_ID = \"$itemid\"";
	$result = $link->query($sql);
	
	if ($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()){
		$cat = $row[P_CAT];
		$sub = $row[P_SUB];
		$partno = $row[P_PARTNO];
		$desc = $row[P_DESC];
			$ret = "<div id='editProdDiv'><h3>Edit item</h3><form name='addprodForm' class='form'><div class='form-group'><label>Category:</label><input type='text' class='form-control' value='".$cat."' id='editProdCatip' required /></div><div class='form-group'><label>Sub-Category:</label><input type='text' class='form-control' value='".$sub."' id='editProdSubip' required /></div><div class='form-group'><label>Product Number:</label><input type='text' class='form-control' value='".$partno."' id='editProdPartnoip' required /></div><div class='form-group'><label>Description:</label><input type='text' class='form-control' value='".$desc."' id='editProdDescip' required /><input type='hidden' name='itemid' id='itemid' value='".$itemid."' /></div><div class='row'><div class='col-xs-12'><a class='btn btn-primary canceditprodbtn'>Cancel</a><button class='btn btn-success pull-right' id='editProdBtn'><span class='glyphicon glyphicon-plus-sign'></span> Save</button></div></div></form></div>";
		}
		
	} else {
		$ret = "<h3>Error</h3><p>There has been a problem.</p><p>" . $sql . " caused the error:<br />" . mysqli_error($link)."</p>";
	}
	echo $ret;
?>