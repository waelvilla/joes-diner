<?php
$db_categories=$db -> query("SELECT * FROM categories");
$categories=array();
while($category = $db_categories->fetch_assoc()){
    array_push($categories,$category);
  }
?>

<h3>Products</h3>

<a data-toggle="modal" data-target="#addProduct" class="btn btn-success mb-3">Add Product</a>

<!-- Add Product Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="add_product_modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_product_modal">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" action="functions/add_product.php">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_name">Product Name</label>
                        <div class="col-md-8 ">
                            <input id="product_name" name="product_name" type="text" placeholder="Product Name" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="category">Category</label>
                        <div class="col-md-9 ">
                            <select name="category" id="category" class="form-control" required>
                                <?php foreach($categories as $row ){
                                    // $row = $categories->fetch_assoc()) :
                                    ?>
                                <option value="<?php echo $row['category'];?>">
                                    <?php echo $row['category'];?>s
                                </option>
                                <?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_price">Product Price ($)</label>
                        <div class="col-md-8 ">
                            <input id="product_price" name="product_price" type="text" placeholder="Product Price"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="product_img">Product Photo</label>
                        <div class="col-md-8 ">
                            <input id="product_img" name="product_img" type="file" accept="image/*" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" value="submit" class="btn btn-primary" name="add_product">Add Product</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Products Per Category List -->
<div class="accordion" id="categories">
    <?php  foreach($categories as $category){
    // while ($category = $categories -> fetch_assoc()) : 
    ?>
    <div class="card">
        <div class="card-header" id="heading_<?php echo $category['category']; ?>">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $category['category']; ?>"
                    aria-expanded="true" aria-controls="<?php echo $category['category']; ?>">
                    <?php echo $category['category']; ?>s
                </button>
            </h2>
        </div>

        <div id="<?php echo $category['category']; ?>" class="collapse show" aria-labelledby="heading_<?php echo $category['category']; ?>"
            data-parent="#categories">
            <div class="card-body">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $c= $category['category'];
                        $products=$db-> query("SELECT * FROM food WHERE category = '$c'");
                        while ($product = $products -> fetch_assoc()):
                        ?>
                        <tr>
                            <td>
                                <img src="../img/items/<?php echo $product['image_name'];?>" class="img-thumbnail menu-img">
                                <br>
                                <a data-toggle="modal" data-target="#editProduct<?php echo $product['id'];?>" class="btn btn-primary">Edit</a>
                                <a href="functions/delete_product.php?id=<?php echo $product['id'];?>" class="btn btn-danger">Delete</a>
                            </td>
                            <th scope="row">
                                <?php echo $product['id'];?>
                            </th>
                            <td>
                                <?php echo $product['title'];?>
                            </td>
                            <td>$
                                <?php echo $product['price'];?>
                            </td>
                        </tr>
                        <!-- Edit Category -->
                        <div class="modal fade" id="editProduct<?php echo $product['id'];?>" tabindex="-1" role="dialog"
                            aria-labelledby="edit_product_modal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit_product_modal">Edit Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="functions/update_product.php?id=<?php echo $product['id'];?>"
                                            enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_name">Product Name</label>
                                                <div class="col-md-8 ">
                                                    <input id="product_name" name="update_product_name" type="text"
                                                        placeholder="Product Name" class="form-control" value="<?php echo $product['title'];?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_price">Price ($)</label>
                                                <div class="col-md-8 ">
                                                    <input id="product_price" name="update_product_price" type="text"
                                                        placeholder="Price" class="form-control" value="<?php echo $product['price'];?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="product_img">Product Photo</label>
                                                <div class="col-md-6">
                                                    <img src="../img/items/<?php echo $product['image_name'];?>" class="card-img-top img-thumbnail menu-img">
                                                </div>
                                                <div class="col-md-3 ">
                                                    <input id="product_img" name="update_product_img" type="file"
                                                        accept="image/*" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" value="submit" class="btn btn-primary" name="edit_product">Save
                                            Changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php } ?>

</div>