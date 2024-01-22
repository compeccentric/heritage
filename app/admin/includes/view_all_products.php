<?php
include("delete_product.php");



if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];

    $query = "DELETE FROM products WHERE product_id = {$product_id}";
    $delete_query = mysqli_query($connection,  $query);

    // $query = "SELECT comment_post_id FROM comments WHERE comment_id = {$the_comment_id}";
    // $post_id = mysqli_query($connection,  $query);   

    // $query = "UPDATE products SET post_comment_count = post_comment_count - 1 WHERE post_id = $post_id";
    // $update_comment_count = mysqli_query($connection,  $query);

    header("Location: products.php");
}

?>
<h1 class="text-center">All Products</h1>
<hr class="border border-primary border-3 opacity-75">

<div class="text-center">
    <form action="products.php?source=download_all_products" method="post">
        <input type="hidden" name="exportCSV" value="exportCSV">
        <button class="btn btn-primary button_width" type="submit">CSV Export</button>
    </form>
</div>
<br>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <!-- <div style="padding-left: 0px;" id="bulkOptionsContainer" class="col-xs-2">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="clone">Clone</option>
                <option value="delete">Delete</option>
                <option value="reset">Reset Post Views</option>
            </select>
        </div> -->
        <!-- <div style="padding-left: 0px;" class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="products.php?source=add_product" id="product_button">Add New</a>
        </div> -->
        <thead>
            <tr>
                <!-- <th><input id="selectAllBoxes" type="checkbox"></th> -->
                
                <th>ID</th>
                <th>SKU</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Category</th>
                <!-- <th>Regular Price</th>
                <th>Sale Price</th> -->
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM products ORDER BY product_id ASC";
            $select_products = mysqli_query($connection,  $query);

            while ($row = mysqli_fetch_assoc($select_products)) {
                $product_id = $row['product_id'];
                $product_sku = $row['product_sku'];
                $product_brand = $row['product_brand'];
                $product_name = $row['product_name'];
                $product_category = $row['product_category'];
                $product_image_one = $row['product_image_one'];



                echo "<tr style='transform: rotate(0);height:125px'>";
                echo "<th scope='row'><a style='text-decoration:none;color:black;' href='products.php?source=view_product&p_id={$product_id}' class='stretched-link'>$product_id</a></th>";
                // echo "<td>$product_id</td>";
                // echo "<td>$product_code</td>";
                echo "<td>$product_sku</td>";
                echo "<td>$product_brand</td>";
                echo "<td>$product_name</td>";
                echo "<td>$product_category</td>";
                echo "<td><img width='100' src='images/product_images/$product_image_one'></td>";

                // echo "<td>$product_gross_weight</td>";

                // $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                // $select_categories = mysqli_query($connection,  $query);
                // while ($row = mysqli_fetch_assoc($select_categories)) {
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                // }

                // echo "<td>$$product_regular_price</td>";
                // echo "<td>$$product_sale_price</td>";
                // echo "<td><a href='products.php?source=view_product&p_id={$product_id}'>View Product</a></td>";
                // echo "<td><a href='products.php?source=edit_product&p_id={$product_id}'>Edit</a></td>";
                // echo "<td><a href='edit_product.php?source=edit_product_general&p_id={$product_id}'>New Edit</a></td>";
                // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='products.php?delete={$product_id}'>Delete</a></td>";
                // echo "<td><a rel='{$product_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function() {

        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "products.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#deleteProductModal").modal('show');
        })
    })
</script>