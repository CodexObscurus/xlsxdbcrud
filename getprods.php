<?php
session_start();
if (isset($_SESSION['cat']) && !empty($_SESSION['cat'])) {
    $_POST["cat"] = $_SESSION["cat"];
	$cat = $_SESSION["cat"];
} else {
	$cat = $_POST["cat"];
}
	include 'cnct.php';
	$sub = $_POST["sub"];
	$sql = "SELECT * FROM product_tbl WHERE P_SUB = \"$sub\"";
	$result = $link->query($sql);
	$ret = "";
	$x = 2;
	if ($result->num_rows > 0) {
		$ret .= "<table class='prodTable'><tr><th>Part Number</th><th>Description</th><th>Action</th></tr>";
		while($row = $result->fetch_assoc()){
			$y = ($x % 2 == 0)?'lightGrey':'darkGrey';
			$ret .= "<tr class='itemrow ".$y."'><td>".$row[P_PARTNO]."</td><td>".$row[P_DESC]."</td><td><a class='btn btn-primary btn-sm fleft edititem' name='".$row[P_ID]."'>Edit</a>&nbsp;&nbsp;<a class='btn btn-primary btn-sm fleft delitem' name='".$row[P_ID]."'>Delete</a></td></tr>";
			$x++;
		}
		$ret .= "</table>";
	} else {
		$ret = "0 results";
	}
echo $ret;

?>