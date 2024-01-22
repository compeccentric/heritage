<?php
include("delete_customer.php");
if (isset($_GET['delete'])) {
    $customer_id = $_GET['delete'];

    $query = "DELETE FROM customers WHERE customer_id = {$customer_id}";
    $delete_query = mysqli_query($connection,  $query);

    // $query = "SELECT comment_post_id FROM comments WHERE comment_id = {$the_comment_id}";
    // $post_id = mysqli_query($connection,  $query);   

    // $query = "UPDATE products SET post_comment_count = post_comment_count - 1 WHERE post_id = $post_id";
    // $update_comment_count = mysqli_query($connection,  $query);

    header("Location: customers.php");
}
if (isset($_GET['c_id'])) {
    $the_customer_id = $_GET['c_id'];
    $_SESSION['the_customer_id'] = $the_customer_id;



    $query = "SELECT * FROM customers WHERE customer_id = $the_customer_id";
    $select_customers = mysqli_query($connection,  $query);

    while ($row = mysqli_fetch_assoc($select_customers)) {
    
        $customer_id = $row['customer_id'];
        $customer_first_name = $row['customer_first_name'];
        $customer_last_name = $row['customer_last_name'];
        $customer_address = $row['customer_address'];
        $customer_city = $row['customer_city'];
        $customer_state = $row['customer_state'];
        $customer_zip = $row['customer_zip'];
        $customer_email = $row['customer_email'];
        $customer_phone_one = $row['customer_phone_one'];
        $customer_phone_two = $row['customer_phone_two'];
        $customer_company = $row['customer_company'];
        $customer_company_web = $row['customer_company_web'];
        $customer_bday = $row['customer_bday'];
        $customer_anniv = $row['customer_anniv'];
        $customer_spouse = $row['customer_spouse'];
        $customer_children = $row['customer_children'];
        $customer_spouse_bday = $row['customer_spouse_bday'];
        $customer_children_bday = $row['customer_children_bday'];
        $customer_size = $row['customer_size'];
        $customer_color = $row['customer_color'];
        $customer_notes = $row['customer_notes'];
        $_SESSION['customer_image_one'] = $row['customer_image_one'];

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
<?php echo "<h1 class='text-center'>Customer: {$customer_first_name} {$customer_last_name}</h1>"; ?>


<hr class="border border-primary border-3 opacity-75">
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row align-items-start my-3">
            <div class="col-lg-4">
                <img class="img-fluid" src="./images/customer_images/<?php echo isset($_SESSION['customer_image_one']) ? $_SESSION['customer_image_one'] : 'placeholder.png'; ?>" ?>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col">
                        <label for="customer_first_name" class="form-label">First Name</label><br>
                        <p class="p_form"><?php echo $customer_first_name;?>
                        </p>
                    </div>
                    <div class="col">
                        <label for="customer_last_name" class="form-label">Last Name</label><br>
                        <p class="p_form"><?php echo $customer_last_name; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="customer_address" class="form-label">Address</label>
                        <p class="p_form"><?php echo $customer_address; ?></p>
                    </div>
                       <div class="col">
                        <label for="customer_zip" class="form-label">Zip Code</label>
                        <p class="p_form"><?php echo $customer_zip; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="customer_city" class="form-label">City</label>
                        <p class="p_form"><?php echo $customer_city; ?></p>
                    </div>
                    <div class="col">
                        <label for="customer_state" class="form-label">State</label>
                        <p class="p_form"><?php echo $customer_state; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="customer_company" class="form-label">Place of Employment</label>
                        <p class="p_form"><?php echo $customer_company; ?></p>
                    </div>
                    <div class="col">
                        <label for="customer_email" class="form-label">Email</label>
                        <p class="p_form"><?php echo $customer_email; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="customer_phone_one" class="form-label">Phone Number Home</label>
                        <p class="p_form"><?php echo $customer_phone_one; ?></p>
                    </div>
                    <div class="col">
                        <label for="customer_phone_two" class="form-label">Phone Number Cell</label>
                        <p class="p_form"><?php echo $customer_phone_two; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="customer_bday" class="form-label">Birthday</label>
                        <p class="p_form"><?php echo $customer_bday; ?></p>
                    </div>
                    <div class="col">
                        <label for="customer_anniv" class="form-label">Anniversary</label>
                        <p class="p_form"><?php echo $customer_anniv; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-start my-3">
                    <div class="col">
                        <label for="customer_spouse" class="form-label">Spouse's First Name</label><br>
                        <p class="p_form"><?php echo $customer_spouse; ?>
                        </p>
                    </div>
                    <div class="col">
                        <label for="customer_spouse_bday" class="form-label">Spouse's Birthday</label><br>
                        <p class="p_form"><?php echo $customer_spouse_bday;?>
                        </p>
                    </div>
                    <div class="col">
                        <label for="customer_size" class="form-label">Size</label><br>
                        <p class="p_form"><?php echo $customer_size;?>
                        </p>
                    </div>
        </div>
         <div class="row align-items-start my-3">
                <div class="col">
                    <label for="customer_color" class="form-label">Favorite Color</label><br>
                    <p class="p_form"><?php echo $customer_color; ?>
                    </p>
                </div>
                <div class="col">
                    <label for="customer_notes" class="form-label">Notes</label><br>
                    <p class="p_form"><?php echo $customer_notes; ?>
                    </p>
                </div>
                <div class="col">
                </div>
        </div>
</div>
<hr class="border border-primary border-3 opacity-75">
<?php
if (is_admin($_SESSION['username'])) {
    echo '<div class="text-center">
    <a href="customers.php?source=edit_customer&c_id=' . $the_customer_id . '"class="btn btn-primary button_width" role="button" aria-disabled="false">Edit</a>
    <a rel="' . $customer_id . '" href="javascript:void(0)" id="delete_link" class="delete_link btn btn-primary button_width" role="button" aria-disabled="false">Delete</a>
</div>';
}
?>
<script>
    $(document).ready(function() {
        $(".delete_link").on('click', function() {
            console.log("hello");
            var id = $(this).attr("rel");
            var delete_url = "customers.php?delete=" + id + " ";
            $(".modal_delete_link").attr("href", delete_url);
            $("#deleteCustomerModal").modal('show');
        })
    })
</script>