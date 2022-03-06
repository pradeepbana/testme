<?php
include_once 'session.php';
include 'auth_check.php';
include 'conn.php';
echo 'successaa bana';
$id = $_SESSION['userid'];
echo $id;
?>
<a href="logout.php">logout</a>