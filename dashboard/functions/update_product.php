<?php
include '../db.php';
$id=$_GET['id'];
if(isset($_POST['edit_product'])){
    $product_name=mysqli_real_escape_string($db, $_POST['update_product_name']);
    $price=mysqli_real_escape_string($db, $_POST['update_product_price']);
	$img_name=$_FILES['update_product_img']['name'];
	$img_extension=pathinfo($img_name)['extension'];
	$imagename=addslashes($_FILES['update_product_img']['name']);
	$img_dir='../../img/items/' . $imagename;
	if(!(move_uploaded_file($_FILES['update_product_img']['tmp_name'],$img_dir))){
		echo "Possible File Attack!"; 
	}
	$sql="UPDATE food SET title='$product_name', price='$price', image_name='$img_name' WHERE id='$id'";
	$val=$db -> query($sql) or die("Cannot execute query");
	
	if($val){
		$message= "<h5 class='text-success'> Updated successfully </h5>";
        header("location: ../index.php?active=Products&res='$message'");
        die();
    }
	else{
		echo "<h5 class='text-danger'> Error Occured </h5";
	}   

}

?>