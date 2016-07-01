<?php
include_once 'inc/class.crud.php';
$crud = new CRUD();
if(isset($_POST['save'])) {
 $pcat = $_POST['addcat'];
 $psub = $_POST['addsub'];
 $partno = $_POST['addpartno'];
 $pdesc = $_POST['adddesc'];
 
 $crud->create($pcat,$psub,$partno,$pdesc);
 echo "<h3>Item added</h3><p>Your item has been added to the catalogue.</p><p><a href='index.php' class='btn btn-primary'>Refresh</a></p>";
}

if(isset($_POST['delete'])) {
 $id = $_POST['itemid'];
 $crud->delete($id);
 echo "<h3>Item deleted</h3><p>Your item has been deleted.</p><p><a href='#' class='btn btn-primary backbtn'>Back</a></p>";
}

if(isset($_POST['update'])) {
 $id = $_POST['itemid'];
 $pcat = $_POST['cat'];
 $psub = $_POST['sub'];
 $partno = $_POST['partno'];
 $pdesc = $_POST['desc'];
 
 $crud->update($pcat,$psub,$partno,$pdesc,$id);
 echo "<h3>Item updated</h3><p>Your item has been updated.</p><p><a href='#' class='btn btn-primary backbtn'>Back</a></p>";
}
?>