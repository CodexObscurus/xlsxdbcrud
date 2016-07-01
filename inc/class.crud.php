<?php
include_once 'dbconfig.php';

class CRUD
{
 public function __construct()
 {
  $db = new DB_con();
 }
 
 public function create($pcat,$psub,$partno,$pdesc)
 {
  mysql_query("INSERT INTO product_tbl(P_ID,P_CAT,P_SUB,P_PARTNO,P_DESC) VALUES(NULL,'$pcat','$psub','$partno','$pdesc')");
 }
 
 public function read()
 {
  return mysql_query("SELECT * FROM product_tbl");
 }
 
 public function update($pcat,$psub,$partno,$pdesc,$id)
 {
  mysql_query("UPDATE product_tbl SET P_CAT='$pcat', P_SUB='$psub', P_PARTNO='$partno', P_DESC='$pdesc' WHERE P_ID=".$id);
 }
 
 public function delete($id)
 {
  mysql_query("DELETE FROM product_tbl WHERE P_ID=".$id);
 }
}
?>