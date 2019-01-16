<?php
$categories=$db -> query("SELECT * FROM categories");
?>

<h3>Products</h3>

<!-- Products Per Category List -->
<div class="accordion" id="categories">
    <?php while ($category = $categories -> fetch_assoc()) : ?>
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
                            <th scope="col" >Product</th>
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
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
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
                        <?php endwhile; ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

</div>