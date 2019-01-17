<?php
include '../db.php';
$old_category=$_GET['category'];
if(isset($_POST['edit_category'])){
	$category_name=mysqli_real_escape_string($db, $_POST['update_category_name']);
	$img_name=$_FILES['update_categ_img']['name'];
	$img_extension=pathinfo($img_name)['extension'];
	$img_dir='../img/categories/' . $category_name . '.' . $img_extension ;

	if(!(move_uploaded_file($_FILES['update_categ_img']['tmp_name'],$img_dir))){
		echo "Possible File Attack!"; 
	}
	$sql="UPDATE categories SET category='$category_name' WHERE category='$old_category'";
	$val=$db -> query($sql) or die("Cannot execute query");
	
	if($val){
        header('location: index.php?active=Categories');
        die();
    }
	else{
		echo "<h5 class='text-danger'> Error Occured </h5";
	}   

}

?>