<?php
	include 'cnct.php';
	$sql = "SELECT DISTINCT(P_CAT) FROM product_tbl ORDER BY `P_CAT` ASC";
	$result = $link->query($sql);
	$ret = "";
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$pc = $row[P_CAT];
			$numsubcats = "SELECT COUNT(P_SUB) FROM product_tbl WHERE P_CAT = \"$pc\"";
			$res2 = mysqli_query($link,$numsubcats);
			while($row2 = $res2->fetch_array()) { $nscr = $row2[0]; }
			$ret .= "<a href='#' class='getsubcatlnk' name='".$row[P_CAT]."'><span class='glyphicon glyphicon-forward'></span>&nbsp;&nbsp;".$row[P_CAT]." <span class='fright'>(".$nscr.")</span></a>";
		}
	} else {
		$ret = "0 results";
	}
	$link->close();
	echo $ret;
?>