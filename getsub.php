<?php
session_start();
$cat = $_POST["cat"];
if (!isset($_SESSION['cat']) || empty($_SESSION['cat'])) {
    $_SESSION["cat"] = $_POST["cat"];
	$cat = $_SESSION["cat"];
}
	include 'cnct.php';
	$sql = "SELECT DISTINCT(P_SUB) FROM product_tbl WHERE P_CAT = \"$cat\"";
	$result = $link->query($sql);
	$ret = "";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$ps = $row[P_SUB];
			$numprods = "SELECT COUNT(P_SUB) FROM product_tbl WHERE P_CAT = \"$cat\" AND P_SUB = \"$ps\"";
			$res2 = mysqli_query($link,$numprods);
			while($row2 = $res2->fetch_array()) { $nscr = $row2[0]; }
			$ret .= "<a href='#' class='getprodslnk' name='".$row[P_SUB]."' title='".$cat."'><span class='glyphicon glyphicon-forward'></span>&nbsp;&nbsp;".$row[P_SUB]." <span class='fright'>(".$nscr.")</span></a>";
		}
	} else {
		$ret .= "0 results";
	}
echo $ret;
?>