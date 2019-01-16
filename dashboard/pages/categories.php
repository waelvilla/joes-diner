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
					<a data-toggle="modal" data-target="#addCategory<?php echo $row['category'];?>" class="btn btn-primary">Modify</a>
					<a href="delete_category.php?category=<?php echo $row['category'];?>" class="btn btn-danger">Delete</a>
				</div>
			</div>
		</div>
		<!-- Edit Category -->
		<div class="modal fade" id="addCategory<?php echo $row['category'];?>" tabindex="-1" role="dialog" aria-labelledby="edit_category_modal"
		 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="edit_category_modal">Edit Category</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-4 control-label" for="category_name">Category Name</label>
								<div class="col-md-8 ">
									<input id="category_name" name="category_name" type="text" placeholder="Category Name" class="form-control"
									 value="<?php echo $row['category']; ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="categ_img">Category Photo</label>
								<div class="col-md-6">
									<img src="../img/categories/<?php echo $row['category'];?>.jpg" class="card-img-top img-thumbnail menu-img">
								</div>
								<div class="col-md-3 ">
									<input id="categ_img" name="categ_img" type="file" accept="image/*" required>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="submit" value="submit" class="btn btn-primary" name="add_category">Save Changes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php endwhile; ?>

		<div class="card col-md-3 m-3 view hoverable" style="width: 18rem;">
			<a data-toggle="modal" data-target="#addCategory">
				<img src="../img/plus.png" class="card-img-top img-thumbnail menu-img">
				<div class="card-body">
					<h5 class="card-title text-primary">Add New Category</h5>
				</div>
			</a>
		</div>
	</div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="add_category_modal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="add_category_modal">Add Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-md-4 control-label" for="category_name">Category Name</label>
						<div class="col-md-8 ">
							<input id="category_name" name="category_name" type="text" placeholder="Category Name" class="form-control"
							 required>
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
				<button type="submit" value="submit" class="btn btn-primary" name="add_category">Add Category</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>