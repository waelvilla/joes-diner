<?php

include 'db.php';
include 'header.php';
$categories=$db->query("select * from categories");
    if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string($db, $_POST['title']);
    $category=mysqli_real_escape_string($db, $_POST['category']);
    $price=mysqli_real_escape_string($db, $_POST['price']);
    $imagename=addslashes($_FILES['up_img']['name']);
    echo $imagename;
    $sql="INSERT INTO food(title,price,category,image_name) VALUES('$title','$price','$category','$imagename')";
    $val=$db->query($sql);
    if($val){
        echo "<h5 class='text-success'> Uploaded successfully </h5>";
    }
    else{
        echo "<h5 class='text-danger'> Error Occured </h5";
    }    
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Item</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"  href="../css/style.css" />
</head>
<body>
    <div class="container pt-5 mt-5">
        <h3 class="text-center">Adding New Item To Menu</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Item Name</label>
                <div class="col-md-9 ">
                    <input id="title" name="title" type="text" placeholder="Item name" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="category">Category</label>
                <div class="col-md-9 ">
                    <select name="category" id="category" class="form-control" required>
                        <?php while ($row = $categories->fetch_assoc()) :?>
                        <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                        <?php endwhile;?>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="price">Price</label>
                <div class="col-md-9 ">
                    <input id="price" name="price" type="number" placeholder="Price" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="up_img">Image</label>
                <div class="col-md-9 ">
                    <input id="up_img" name="up_img" type="file" accept="image/*" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 text-center">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </div>
        </form>

    </div>
