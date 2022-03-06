<?php
include_once 'session.php';
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}
?>