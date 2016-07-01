<?php
$link = new mysqli("","","",""); // host, username, password, database
if ($link->connect_error) {die("Connection failed: " . $link->connect_error);}
?>