<?php
include '../db.php';
// include 'header.php';
// $categories=$db->query("select * from categories");
    if(isset($_POST['add_product'])){
    $title=mysqli_real_escape_string($db, $_POST['product_name']);
    $category=mysqli_real_escape_string($db, $_POST['category']);
    $price=mysqli_real_escape_string($db, $_POST['product_price']);
    $imagename=addslashes($_FILES['product_img']['name']);
    $img_dir='../../img/items/' . $imagename;

    if(!(move_uploaded_file($_FILES['product_img']['tmp_name'],$img_dir))){
		echo "Possible File Attack!"; 
	}
    $sql="INSERT INTO food(title,price,category,image_name) VALUES('$title','$price','$category','$imagename')";
    $val=$db->query($sql);
    if($val){
        $message= "<h5 class='text-success'> Uploaded successfully </h5>";
        header("location: ../index.php?active=Products&res='$message'");
        die();
    }
    else{
        echo "<h5 class='text-danger'> Error Occured </h5";
    }    
}
?>
