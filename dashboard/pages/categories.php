<?php 
$categories= $db -> query("SELECT * FROM categories");
$img_name="";
if(isset($_POST['add_category'])){
	$category_name=mysqli_real_escape_string($db, $_POST['category_name']);
	$img_name=$_FILES['categ_img']['name'];
	$img_extension=pathinfo($img_name)['extension'];
	$img_dir='../img/categories/' . $category_name . '.' . $img_extension ;

	if(!(move_uploaded_file($_FILES['categ_img']['tmp_name'],$img_dir))){
		echo "Possible File Attack!"; 
	}
	$sql="INSERT INTO categories(category) VALUES ('$category_name')";
	$val=$db -> query($sql) or die("Cannot execute query");
	
	if($val){
		echo "<h5 class='text-success'> Uploaded successfully </h5>";
	}
	else{
		echo "<h5 class='text-danger'> Error Occured </h5";
	}   
}
?>

<h3>Categories</h3>
<div class="container">
	<div class="row">
	<?php while($row = $categories ->fetch_assoc()) : ?>
		<div class="card col-md-3 m-3" style="width: 18rem;">
			<img src="../img/categories/<?php echo $row['category'];?>.jpg" class="card-img-top img-thumbnail menu-img">
			<div class="card-body">
				<h5 class="card-title"><?php echo $row['category']; ?>s</h5>
				<p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corporis</p>
				<div class="container">
				<a href="#" class="btn btn-primary" >Modify</a>
				<a href="#" class="btn btn-danger" >Delete</a>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
		<div class="card col-md-3 m-3 view hoverable" style="width: 18rem;">
			<a data-toggle="modal" data-target="#addCategory">
				<img src="../img/plus.png" class="card-img-top img-thumbnail menu-img" >
				<div class="card-body">
					<h5 class="card-title text-primary">Add New Category</h5>
				</div>
			</a>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-4 control-label" for="category_name">Category Name</label>
						<div class="col-md-8 ">
							<input id="category_name" name="category_name" type="text" placeholder="Category Name" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="categ_img">Category Photo</label>
						<div class="col-md-8 ">
							<input id="categ_img" name="categ_img" type="file" accept="image/*" required>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" class="btn btn-primary" name="add_category">Add Category</button>
				</form>
			</div>
		</div>
  </div>
</div>
