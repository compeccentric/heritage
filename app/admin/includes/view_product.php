<?php
include("delete_product.php");
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
        $_SESSION['product_name'] = $row['product_name'];
        $_SESSION['product_image_one'] = $row['product_image_one'];

    }

    if (isset($_POST['update_product'])) {
        // $product_code = $_POST['product_code'];
        $_SESSION['product_name'] = $_POST['product_name'];


        $query = "UPDATE products SET ";

        $query .= "product_name = '{$_SESSION['product_name']}' ";
        $query .= "WHERE product_id = '{$the_product_id}' ";
        $update_product = mysqli_query($connection,  $query);
        confirmQuery($update_product);
        echo "<p class='bg-success'>Product Updated: " . " " . "<a href='products.php'>Edit More Products</a></p>";
    }
}
?>
<?php echo "<h1 class='text-center'>Product: {$product_brand} {$product_name}</h1>"; ?>


<hr class="border border-primary border-3 opacity-75">
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row align-items-start my-3">
            <div class="col-lg-4">
                <img class="img-fluid" src="./images/product_images/<?php echo isset($_SESSION['product_image_one']) ? $_SESSION['product_image_one'] : 'placeholder.png'; ?>" ?>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <label for="product_manufacturer" class="form-label">Brand</label><br>
                        <p class="p_form">
                            <?php echo (empty($product_brand)) ? "N/A" : "$product_brand" ?>
                        </p>
                    </div>
                    <div class="col">
                        <label for="product_name" class="form-label">Name</label>
                        <p class="p_form"><?php echo $_SESSION['product_name']; ?></p>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <label for="product_sku" class="form-label">SKU</label>
                        <p class="p_form"><?php echo $product_sku; ?></p>
                    </div>
                    <div class="col">
                        <label for="product_type" class="form-label">Category</label>
                        <p class="p_form"><?php echo $product_category; ?></p>
                    </div>
                </div>
                <div class="row">
                  
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-website" role="tabpanel" aria-labelledby="pills-website-tab">
        <div class="row align-items-start my-3">
            <div class="col">
                <label for="product_website_name" class="form-label">Website Name</label>
                <input value='<?php echo $product_website_name; ?>' type="text" class="form-control" name="product_website_name">
            </div>
            <div class="col">
                <label for="product_website_category" class="form-label">Website Category</label><br>
                <select class="form-select" name="product_website_category" id="product_website_category">
                    <?php

                    if ($product_website_category == '') {
                        echo '<option selected="true" disabled="disabled">Choose...</option>';
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection,  $query);
                        confirmQuery($select_categories);
                        while ($row = mysqli_fetch_assoc($select_categories)) {

                            $categories_title = $row['categories_title'];
                            echo "<option value='$categories_title'>{$categories_title}</option>";
                        }
                    } else {
                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($connection,  $query);
                        confirmQuery($select_categories);
                        while ($row = mysqli_fetch_assoc($select_categories)) {
                            $categories_title = $row['categories_title'];
                            if ($categories_title == $product_website_category) {
                                echo "<option value='$categories_title' selected>{$categories_title}</option>";
                            } else {
                                echo "<option value='$categories_title'>{$categories_title}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_short_desc" class="form-label">Short Description</label>
                    <input value='<?php echo $product_short_desc; ?>' type="text" class="form-control" name="product_short_desc">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_long_desc" class="form-label">Long Description</label>
                    <input value='<?php echo $product_long_desc; ?>' type="text" class="form-control" name="product_long_desc">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_highlight_one" class="form-label">Highlight One</label>
                    <input value='<?php echo $product_highlight_one; ?>' type="text" class="form-control" name="product_highlight_one">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_highlight_two" class="form-label">Highlight Two</label>
                    <input value='<?php echo $product_highlight_two; ?>' type="text" class="form-control" name="product_highlight_two">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_highlight_three" class="form-label">Highlight Three</label>
                    <input value='<?php echo $product_highlight_three; ?>' type="text" class="form-control" name="product_highlight_three">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_highlight_four" class="form-label">Highlight Four</label>
                    <input value='<?php echo $product_highlight_four; ?>' type="text" class="form-control" name="product_highlight_four">
                </div>
            </div>
        </div>
        <div class="row align-items-start  my-3">
            <div class="col">
                <div class="mb-3">
                    <label for="product_highlight_five" class="form-label">Highlight Five</label>
                    <input value='<?php echo $product_highlight_five; ?>' type="text" class="form-control" name="product_highlight_five">
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-prices" role="tabpanel" aria-labelledby="pills-prices-tab">
        <div class="row align-items-start my-3">
            <div class="col">
                <label for="product_code" class="form-label">MSRP</label>
                <input value="<?php echo $product_msrp; ?>" type="text" class="form-control" name="product_msrp">
            </div>
            <div class="col">
                <label for="product_sku" class="form-label">MAP</label>
                <input value="<?php echo $product_map; ?>" type="text" class="form-control" name="product_map">
            </div>
            <div class="col">
                <label for="product_ecom_dash" class="form-label">Open Box</label>
                <input value="<?php echo $product_open_box_price; ?>" type="text" class="form-control" name="product_open_box">
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="pills-dims" role="tabpanel" aria-labelledby="pills-dims-tab">
    </div>
</div>
<hr class="border border-primary border-3 opacity-75">
<?php
if (is_admin($_SESSION['username'])) {
    echo '<div class="text-center">
    <a href="products.php?source=edit_product&p_id=' . $the_product_id . '"class="btn btn-primary button_width" role="button" aria-disabled="false">Edit</a>
    <a rel="' . $product_id . '" href="javascript:void(0)" id="delete_link" class="delete_link btn btn-primary button_width" role="button" aria-disabled="false">Delete</a>
</div>';
}
?>


<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            console.log("hello");
            var id = $(this).attr("rel");
            var delete_url = "products.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#deleteProductModal").modal('show');
        })
    })
</script>