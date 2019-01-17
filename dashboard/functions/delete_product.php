<?php
include '../db.php';

$id=$_GET['id'];
$sql="DELETE FROM food WHERE id = '$id'";
$val= $db -> query($sql);
if($val){
    echo $id . " deleted successfully";
    header('location: index.php?active=Products');
    die();
}

?>