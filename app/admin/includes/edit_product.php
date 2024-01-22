<?php

if (isset($_GET['p_id'])) {
    $the_product_id = $_GET['p_id'];
    $_SESSION['the_product_id'] = $the_product_id;


    $query = "SELECT * FROM products WHERE product_id = $the_product_id";
    $select_products = mysqli_query($connection,  $query);

    while ($row = mysqli_fetch_assoc($select_products)) {

        $product_id  = $row['product_id'];
        $product_sku = $row['product_sku'];
        $product_brand = $row['product_brand'];
        $product_name = $row['product_name'];
        $product_category = $row['product_category'];
        $product_image_one = $row['product_image_one'];
        $_SESSION['product_brand'] = $row['product_brand'];
        $_SESSION['product_category'] = $row['product_category'];
        $_SESSION['product_image_one'] = $row['product_image_one'];


    }

    if (isset($_POST['update_product'])) {
        // $product_code = $_POST['product_code'];
        $product_name = $_POST['product_name'];
        $product_sku = $_POST['product_sku'];
        $product_brand = $_POST['product_brand'];
        $product_category = $_POST['product_category'];
        $filename = $_FILES['product_image_one']["name"];
        $tempname = $_FILES['product_image_one']["tmp_name"];
        $folder = "./images/product_images/" . $filename;
        if(! $filename){
            $filename = $_SESSION['product_image_one'];
        } else { 
            $filename = $_FILES['product_image_one']["name"];
        };



        $query = "UPDATE products SET ";

        $query .= "product_name = '{$product_name}', ";
        $query .= "product_sku = '{$product_sku}', ";
        $query .= "product_image_one = '{$filename}', ";
        $query .= "product_brand = '{$product_brand}', ";
        $query .= "product_category = '{$product_category}' ";
        $query .= "WHERE product_id = '{$the_product_id}' ";
        $update_product = mysqli_query($connection,  $query);

        confirmQuery($update_product);
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image updated!</h3>";
        } else {
            echo "<h3>  Image not updated!</h3>";
        }
        echo "<p class='bg-success'>Product Updated: " . " " . "<a href='products.php'>Edit More Products</a></p>";
    }
}
?>
<?php echo "<h1 class='text-center'>Edit: {$product_brand} {$product_name}</h1>"; ?>


<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row align-items-start my-3">
        <div class="col-lg-4">
            <img class="img-fluid" src="./images/product_images/<?php echo $product_image_one ?>">
            <div class="col">
                <label for="product_image_one" class="form-label">Product Image One</label>
                <input class="form-control" type="file" name="product_image_one" value="" />
            </div>
        </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    <label for="product_brand" class="form-label">Brand</label><br>
                    <select class="form-select" name="product_brand" id="product_brand">
                        <?php
                            if (empty($_SESSION['product_brand'])) {
                                echo '<option selected="true" disabled="disabled">Choose...</option>';
                                $query = "SELECT * FROM brands";
                                $select_brands = mysqli_query($connection,  $query);
                                confirmQuery($select_brands);
                                while ($row = mysqli_fetch_assoc($select_brands)) {

                                    $brand_name = $row['brand_name'];
                                    echo "<option value='$brand_name'>{$brand_name}</option>";
                                }
                            } else {
                                $query = "SELECT * FROM brands";
                                $select_brands = mysqli_query($connection,  $query);
                                confirmQuery($select_brands);
                                while ($row = mysqli_fetch_assoc($select_brands)) {
                                    $brand_name = $row['brand_name'];
                                    if ($brand_name == $_SESSION['product_brand']) {
                                        echo "<option value='$brand_name' selected>{$brand_name}</option>";
                                    } else {
                                        echo "<option value='$brand_name'>{$brand_name}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <label for="product_name" class="form-label">Name</label>
                    <input value="<?php echo $_SESSION['product_name']; ?>" type="text" class="form-control" name="product_name">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="product_sku" class="form-label">SKU</label>
                    <input value="<?php echo $product_sku; ?>" type="text" class="form-control" name="product_sku">
                </div>
                <div class="col">
                    <label for="product_category" class="form-label">Category</label><br>
                    <select class="form-select" name="product_category" id="product_category">
                        <?php
                            if (empty($_SESSION['product_category'])) {
                                echo '<option selected="true" disabled="disabled">Choose...</option>';
                                $query = "SELECT * FROM categories";
                                $select_categories = mysqli_query($connection,  $query);
                                confirmQuery($select_categories);
                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $category_name = $row['category_name'];
                                    echo "<option value='$category_name'>{$category_name}</option>";
                                }
                            } else {
                                $query = "SELECT * FROM categories";
                                $select_categories = mysqli_query($connection,  $query);
                                confirmQuery($select_categories);
                                while ($row = mysqli_fetch_assoc($select_categories)) {
                                    $category_name = $row['category_name'];
                                    if ($category_name == $_SESSION['product_category']) {
                                        echo "<option value='$category_name' selected>{$category_name}</option>";
                                    } else {
                                        echo "<option value='$category_name'>{$category_name}</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
 
    <hr class="border border-primary border-3 opacity-75">
    <div class="text-center form-group my-3">
        <input class="btn btn-primary button_width" type="submit" name="update_product" value="Update Product">
        <a href="products.php?source=view_product&p_id=<?php echo $the_product_id ?>" class="btn btn-primary button_width" role="button" aria-disabled="false">View</a>

    </div>
    <br>
</form>