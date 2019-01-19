<?php
include '../db.php';

$id=$_GET['id'];
$sql="DELETE FROM food WHERE id = '$id'";
$val= $db -> query($sql);
if($val){
    $message= "<h5 class='text-success'> Deleted successfully </h5>";
    header("location: ../index.php?active=Products&res='$message'");
    die();
}

?>