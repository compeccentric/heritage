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

?>
<h1 class="text-center">All Customers</h1>
<hr class="border border-primary border-3 opacity-75">

<div class="text-center">
    <form action="products.php?source=download_all_customers" method="post">
        <input type="hidden" name="exportCSV" value="exportCSV">
        <button class="btn btn-primary button_width" type="submit">CSV Export</button>
    </form>
</div>
<br>
<form action="" method="post">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Email</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM customers ORDER BY customer_id ASC";
            $select_products = mysqli_query($connection,  $query);

            while ($row = mysqli_fetch_assoc($select_products)) {
                $customer_id = $row['customer_id'];
                $customer_first_name = $row['customer_first_name'];
                $customer_last_name = $row['customer_last_name'];
                $customer_address = $row['customer_address'];
                $customer_city = $row['customer_city'];
                $customer_state = $row['customer_state'];
                $customer_zip = $row['customer_zip'];
                $customer_email = $row['customer_email'];
                $customer_image_one = $row['customer_image_one'];



                echo "<tr style='transform: rotate(0);'>";
                echo "<th scope='row'><a style='text-decoration:none;color:black;' href='customers.php?source=view_customer&c_id={$customer_id}' class='stretched-link'>$customer_id</a></th>";
                echo "<td>$customer_first_name</td>";
                echo "<td>$customer_last_name</td>";
                echo "<td>$customer_address</td>";
                echo "<td>$customer_city</td>";
                echo "<td>$customer_state</td>";
                echo "<td>$customer_zip</td>";
                echo "<td>$customer_email</td>";
                echo "<td><img width='100' src='./images/customer_images/$customer_image_one'></td>";
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