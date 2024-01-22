<?php

if (isset($_GET['c_id'])) {
    $the_customer_id = $_GET['c_id'];
    $_SESSION['the_customer_id'] = $the_customer_id;


    $query = "SELECT * FROM customers WHERE customer_id = $the_customer_id";
    $select_customers = mysqli_query($connection,  $query);

    while ($row = mysqli_fetch_assoc($select_customers)) {

        $customer_id  = $row['customer_id'];
        $customer_first_name = $row['customer_first_name'];
        $customer_last_name = $row['customer_last_name'];
        $customer_address = $row['customer_address'];
        $customer_city = $row['customer_city'];
        $customer_state = $row['customer_state'];
        $customer_zip = $row['customer_zip'];
        $customer_company = $row['customer_company'];
        $customer_email = $row['customer_email'];
        $customer_phone_one = $row['customer_phone_one'];
        $customer_phone_two = $row['customer_phone_two'];
        $customer_image_one = $row['customer_image_one'];
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

    if (isset($_POST['update_customer'])) {
        $customer_first_name = $_POST['customer_first_name'];
        $customer_last_name = $_POST['customer_last_name'];
        $customer_address = $_POST['customer_address'];
        $customer_city = $_POST['customer_city'];
        $customer_state = $_POST['customer_state'];
        $customer_zip = $_POST['customer_zip'];
        $customer_company = $_POST['customer_company'];
        $customer_email = $_POST['customer_email'];
        $customer_phone_one = $_POST['customer_phone_one'];
        $customer_phone_two = $_POST['customer_phone_two'];
        $customer_bday = $_POST['customer_bday'];
        $customer_anniv = $_POST['customer_anniv'];
        $customer_spouse = $_POST['customer_spouse'];
        $customer_spouse_bday = $_POST['customer_spouse_bday'];
        $customer_size = $_POST['customer_size'];
        $customer_color = $_POST['customer_color'];
        $customer_notes = $_POST['customer_notes'];
        $filename = $_FILES['customer_image_one']["name"];
        $tempname = $_FILES['customer_image_one']["tmp_name"];
        $folder = "./images/customer_images/" . $filename;
      if(! $filename){
            $filename = $_SESSION['customer_image_one'];
        } else { 
            $filename = $_FILES['customer_image_one']["name"];
        };




        $query = "UPDATE customers SET ";
        $query .= "customer_first_name = '{$customer_first_name}', ";
        $query .= "customer_last_name = '{$customer_last_name}', ";
        $query .= "customer_address = '{$customer_address}', ";
        $query .= "customer_city = '{$customer_city}', ";
        $query .= "customer_state = '{$customer_state}', ";
        $query .= "customer_zip = '{$customer_zip}', ";
        $query .= "customer_company = '{$customer_company}', ";
        $query .= "customer_email = '{$customer_email}', ";
        $query .= "customer_phone_one = '{$customer_phone_one}', ";
        $query .= "customer_phone_two = '{$customer_phone_two}', ";
        $query .= "customer_bday = '{$customer_bday}', ";
        $query .= "customer_anniv = '{$customer_anniv}', ";
        $query .= "customer_spouse = '{$customer_spouse}', ";
        $query .= "customer_spouse_bday = '{$customer_spouse_bday}', ";
        $query .= "customer_size = '{$customer_size}', ";
        $query .= "customer_color = '{$customer_color}', ";
        $query .= "customer_notes = '{$customer_notes}', ";
        $query .= "customer_image_one = '{$filename}' ";
        $query .= "WHERE customer_id = '{$the_customer_id}' ";
        $update_customer = mysqli_query($connection,  $query);

        confirmQuery($update_customer);
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image updated!</h3>";
        } else {
            echo "<h3>   Image not updated!</h3>";
        }
        echo "<p class='bg-success'>Product Updated: " . " " . "<a href='products.php'>Edit More Products</a></p>";
    }
}
?>
<?php echo "<h1 class='text-center'>Edit: {$customer_first_name} {$customer_last_name}</h1>"; ?>


<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
    <div class="row align-items-start">
            <div class="col-lg-4">
                <img class="img-fluid" src="./images/customer_images/<?php echo $customer_image_one ?>"><br><br><br>
                <input class="form-control" type="file" name="customer_image_one" value="" />
            </div>
            <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="customer_first_name" class="form-label">First Name</label>
                            <input value="<?php echo $customer_first_name; ?>" type="text" class="form-control" name="customer_first_name"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_last_name" class="form-label">Last Name</label>
                            <input value="<?php echo $customer_last_name; ?>" type="text" class="form-control" name="customer_last_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_address" class="form-label">Address</label>
                            <input value="<?php echo $customer_address; ?>" type="text" class="form-control" name="customer_address"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_zip" class="form-label">Zip Code</label>
                            <input value="<?php echo $customer_zip; ?>" type="text" class="form-control" name="customer_zip">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col">
                            <label for="customer_city" class="form-label">City</label>
                            <input value="<?php echo $customer_city; ?>" type="text" class="form-control" name="customer_city"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_state" class="form-label">State</label>
                            <input value="<?php echo $customer_state; ?>" type="text" class="form-control" name="customer_state">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_company" class="form-label">Place of Employment</label>
                            <input value="<?php echo $customer_company; ?>" type="text" class="form-control" name="customer_company"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_email" class="form-label">Email</label>
                            <input value="<?php echo $customer_email; ?>" type="text" class="form-control" name="customer_email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_phone_one" class="form-label">Phone Number Home</label>
                            <input value="<?php echo $customer_phone_one; ?>" type="text" class="form-control" name="customer_phone_one"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_phone_two" class="form-label">Phone Number Cell</label>
                            <input value="<?php echo $customer_phone_two; ?>" type="text" class="form-control" name="customer_phone_two">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_bday" class="form-label">Customer Birthday</label>
                            <input value="<?php echo $customer_bday; ?>" type="text" class="form-control datepicker" name="customer_bday"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_anniv" class="form-label">Customer Anniversary</label>
                            <input value="<?php echo $customer_anniv; ?>" type="text" class="form-control datepicker" name="customer_anniv">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_spouse" class="form-label">Spouse's Name</label>
                            <input value="<?php echo $customer_spouse; ?>" type="text" class="form-control" name="customer_spouse"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_spouse_bday" class="form-label">Spouse's Birthday</label>
                            <input value="<?php echo $customer_spouse_bday; ?>" type="text" class="form-control datepicker" name="customer_spouse_bday">
                        </div>
                    </div>
             </div>
            </div>
        </div>
        <div class="row align-items-start">
             <div class="col">
                <label for="customer_size" class="form-label">Size</label>
                <input value="<?php echo $customer_size; ?>" type="text" class="form-control" name="customer_size">
            </div>
            <div class="col">
                <label for="customer_color" class="form-label">Favorite Color</label>
                <input value="<?php echo $customer_color; ?>" type="text" class="form-control" name="customer_color">
            </div>
            <div class="col">
                <label for="customer_notes" class="form-label">Notes</label>
                <input value="<?php echo $customer_notes; ?>" type="text" class="form-control" name="customer_notes">
            </div>
        </div>
    </div>
    <hr class="border border-primary border-3 opacity-75">
    <div class="text-center form-group my-3">
        <input class="btn btn-primary button_width" type="submit" name="update_customer" value="Update Customer">
        <a href="customers.php?source=view_customer&c_id=<?php echo $the_customer_id ?>" class="btn btn-primary button_width" role="button" aria-disabled="false">View</a>

    </div>
    <br>
</form>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: 'MM d yy', yearRange: "1924:2024" });
  } );
  </script>