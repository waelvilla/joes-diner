<?php 
$categories= $db -> query("SELECT * FROM categories");

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
				<a href="#" class="btn btn-primary">View Products</a>
			</div>
		</div>
	<?php endwhile; ?>
		<div class="card col-md-3 m-3" style="width: 18rem;">
			<a href="#"><img src="../img/plus.png" class="card-img-top img-thumbnail menu-img">
			<div class="card-body">
				<h5 class="card-title text-primary"><a href="#">Add New Category</a></h5>
			</div></a>
		</div>
	</div>

</div>


