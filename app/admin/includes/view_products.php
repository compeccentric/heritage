<?php
include("delete_product.php");

$brand = '';
if ($_GET['brand'] == 'dahon') {
    $brand = 'Dahon';
} elseif ($_GET['brand'] == 'scott') {
    $brand = 'Scott';
} elseif ($_GET['brand'] == 'specialized') {
    $brand = 'Specialized';
} elseif ($_GET['brand'] == 'marin') {
    $brand = 'Marin';
}




if (isset($_GET['delete'])) {
    $product_id = $_GET['delete'];

    $query = "DELETE FROM products WHERE product_id = {$product_id}";
    $delete_query = mysqli_query($connection,  $query);

    header("Location: products.php");
}


// if (isset($_POST['checkBoxArray'])) {

//     foreach ($_POST['checkBoxArray'] as $postValueId) {
//         $bulk_options = $_POST['bulk_options'];
//         switch ($bulk_options) {
//             case 'published':
//                 $query = "UPDATE posts SET ";
//                 $query .= "post_status = '{$bulk_options}'";
//                 $query .= "WHERE post_id = '{$postValueId}' ";
//                 $update_to_published_status = mysqli_query($connection,  $query);
//                 echo "<p class='bg-success'>Posts Set To Published</p>";

//                 echo "Post Updated!";
//                 break;
//             case 'draft':
//                 $query = "UPDATE posts SET ";
//                 $query .= "post_status = '{$bulk_options}'";
//                 $query .= "WHERE post_id = '{$postValueId}' ";
//                 $update_to_draft_status = mysqli_query($connection,  $query);
//                 echo "<p class='bg-success'>Posts Set To Draft</p>";
//                 break;
//             case 'clone':
//                 $query = "SELECT * FROM posts WHERE post_id = '{$postValueId}'";
//                 $select_post_query = mysqli_query($connection,  $query);
//                 while ($row = mysqli_fetch_assoc($select_post_query)) {
//                     $post_title = $row['post_title'];
//                     $post_author = $row['post_author'];
//                     $post_category_id = $row['post_category_id'];
//                     $post_status = $row['post_status'];
//                     $post_image = $row['post_image'];
//                     $post_tags = $row['post_tags'];
//                     $post_content = $row['post_content'];
//                     $query = "INSERT INTO posts(post_category_id,  post_title,  post_author,  post_date,  post_image,  post_content,  post_tags,  post_status) ";
//                     $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
//                     $clone_post_query = mysqli_query($connection,  $query);
//                 }
//                 echo "<p class='bg-success'>Posts Cloned</p>";
//                 break;
//             case 'delete':
//                 $query = "DELETE FROM posts ";
//                 $query .= "WHERE post_id = '{$postValueId}' ";
//                 $delete_posts = mysqli_query($connection,  $query);
//                 echo "<p class='bg-success'>Posts Deleted</p>";
//                 break;
//             case 'reset':
//                 $query = "UPDATE posts SET ";
//                 $query .= "post_views = '{$bulk_options}'";
//                 $query .= "WHERE post_id = '{$postValueId}' ";
//                 $reset_post_views = mysqli_query($connection,  $query);
//                 echo "<p class='bg-success'>Posts Views Reset</p>";
//                 break;
//         }
//     }
// }
?>
<h1 class="text-center"><?php echo $brand ?> Products</h1>
<hr class="border border-primary border-3 opacity-75">
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
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM products WHERE product_brand='$brand'";
            $select_products = mysqli_query($connection,  $query);

            while ($row = mysqli_fetch_assoc($select_products)) {
                 $product_id = $row['product_id'];
                $product_sku = $row['product_sku'];
                $product_brand = $row['product_brand'];
                $product_name = $row['product_name'];
                $product_category = $row['product_category'];
                $product_image_one = $row['product_image_one'];



                echo "<tr style='transform: rotate(0);'>";
                echo "<th scope='row'><a style='text-decoration:none;color:black;' href='products.php?source=view_product&p_id={$product_id}' class='stretched-link'>$product_id</a></th>";
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
                // echo "<td><img width='100' src='images/$product_image'></td>";
                // echo "<td><a href='product.php?p_id={$product_id}'>View Product</a></td>";
                // echo "<td><a href='products.php?source=edit_product&p_id={$product_id}'>Edit</a></td>";
                // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" href='products.php?delete={$product_id}'>Delete</a></td>";
                // echo "<td><a rel='{$product_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>