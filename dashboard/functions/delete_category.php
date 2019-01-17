<?php
include '../db.php';

$category=$_GET['category'];
$sql="DELETE FROM categories WHERE category = '$category'";
$val= $db -> query($sql);
if($val){
    echo $category . " deleted successfully";
    header('location: ../index.php?active=Categories');
    die();
}

?>