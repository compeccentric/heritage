<?php
$brand = '';
if ($_GET['brand'] == 'dahon') {
    $brand = 'Dahon';
} elseif ($_GET['brand'] == 'scott') {
    $brand = 'Scott';
}elseif ($_GET['brand'] == 'specialized') {
    $brand = 'Specialized';
}elseif ($_GET['brand'] == 'marin') {
    $brand = 'Marin';
}

if (isset($_POST['create_product'])) {
    $product_sku = $_POST['product_sku'];
    $product_brand = $_POST['product_brand'];
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $filename = $_FILES['product_image_one']["name"];
    $tempname = $_FILES['product_image_one']["tmp_name"];
    $folder = "./images/product_images/" . $filename;

    $query = "INSERT INTO products( product_sku,  product_brand,  product_name,  product_category, product_image_one) ";
    $query .= "VALUES('{$product_sku}', '{$product_brand}', '{$product_name}', '{$product_category}', '{$filename}') ";
    $create_product_query = mysqli_query($connection,  $query);
    //confirmQuery($create_post_query);
    $the_product_id = mysqli_insert_id($connection);
    if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    echo "<p class='bg-success'>Product Created";
}
?>
<h1 class="text-center">Add New <?= $brand ?> Product</h1>
<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row align-items-start">
        <div class="col">
            <label for="product_sku" class="form-label">SKU</label>
            <input type="text" class="form-control" name="product_sku">
        </div>
        <div class="col">
            <label for="product_brand" class="form-label">Brand</label><br>
            <?php
            if ($brand == 'Dahon') {
                echo '<input type="text" class="form-control" name="product_brand" value="Dahon">';
            } elseif ($brand == 'Scott') {
                echo '<input type="text" class="form-control" name="product_brand" value="Scott">';
            } elseif ($brand == 'Specialized') {
                echo '<input type="text" class="form-control" name="product_brand" value="Specialized">';
            } elseif ($brand == 'Marin') {
                echo '<input type="text" class="form-control" name="product_brand" value="Marin">';
            }
            ?>
            </select>
        </div>
        
    </div>
    <div class="row align-items-start">
        <div class="col">
            <label for="product_name" class="form-label">Name/Model</label>
            <input type="text" class="form-control" name="product_name">
        </div>
        <div class="col">
            <label for="product_category" class="form-label">Category</label><br>
            <select class="form-select" name="product_category" id="product_category">
                <?php
                echo '<option selected="true" disabled="disabled">Choose...</option>';
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                confirmQuery($select_categories);
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $category_name = $row['category_name'];
                    echo "<option value='$category_name'>{$category_name}</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row align-items-start">
        <div class="col">
                <label for="product_image_one" class="form-label">Product Image One</label>
                <input class="form-control" type="file" name="product_image_one" value="" />
        </div>
    </div>
    <br>
    <hr class="border border-primary border-3 opacity-75">

    <div class="text-center form-group">
        <input class="btn btn-primary button_width" type="submit" name="create_product" value="Create product">

    </div>
    <br>
</form>

