<?php

if (isset($_POST['add_customer'])) {
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

    
        $query = "INSERT INTO customers( customer_first_name,  customer_last_name,  customer_address,  customer_city, customer_state, customer_zip, customer_company, customer_email, customer_phone_one, customer_phone_two, customer_bday, customer_anniv, customer_spouse, customer_spouse_bday, customer_size, customer_color, customer_notes, customer_image_one) ";
        $query .= "VALUES('{$customer_first_name}', '{$customer_last_name}', '{$customer_address}', '{$customer_city}', '{$customer_state}', '{$customer_zip}', '{$customer_company}', '{$customer_email}', '{$customer_phone_one}', '{$customer_phone_two}', '{$customer_bday}', '{$customer_anniv}', '{$customer_spouse}', '{$customer_spouse_bday}', '{$customer_size}', '{$customer_color}', '{$customer_notes}', '{$filename}') ";
    $add_customer_query = mysqli_query($connection,  $query);
    //confirmQuery($create_post_query);
    $the_customer_id = mysqli_insert_id($connection);
    if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    echo "<p class='bg-success'>Product Created";
}
?>
<h1 class="text-center">Add New Customer</h1>
<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
  <div class="row align-items-start">
            <div class="col">
                    <div class="row">
                        <div class="col">
                            <label for="customer_first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="customer_first_name"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="customer_last_name">
                        </div>
                  
                        <div class="col">
                            <label for="customer_address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="customer_address"><p></p>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col">
                            <label for="customer_city" class="form-label">City</label>
                            <input type="text" class="form-control" name="customer_city"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_state" class="form-label">State</label>
                            <input type="text" class="form-control" name="customer_state">
                        </div>
                        <div class="col">
                            <label for="customer_zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" name="customer_zip">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_company" class="form-label">Place of Employment</label>
                            <input type="text" class="form-control" name="customer_company"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="customer_email">
                        </div>
                        <div class="col">
                            <label for="customer_phone_one" class="form-label">Phone Number Home</label>
                            <input type="text" class="form-control" name="customer_phone_one"><p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_phone_two" class="form-label">Phone Number Cell</label>
                            <input type="text" class="form-control" name="customer_phone_two">
                        </div>
                        <div class="col">
                            <label for="customer_bday" class="form-label">Customer Birthday</label>
                            <input type="text" class="form-control datepicker" name="customer_bday"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_anniv" class="form-label">Customer Anniversary</label>
                            <input type="text" class="form-control datepicker" name="customer_anniv">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_spouse" class="form-label">Spouse's Name</label>
                            <input type="text" class="form-control" name="customer_spouse"><p></p>
                        </div>
                        <div class="col">
                            <label for="customer_spouse_bday" class="form-label">Spouse's Birthday</label>
                            <input type="text" class="form-control datepicker" name="customer_spouse_bday">
                        </div>
                        <div class="col">
                            <label for="customer_size" class="form-label">Size</label>
                            <input type="text" class="form-control" name="customer_size">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="customer_color" class="form-label">Favorite Color</label>
                            <input type="text" class="form-control" name="customer_color">
                        </div>
                        <div class="col">
                            <label for="customer_notes" class="form-label">Notes</label>
                            <input type="text" class="form-control" name="customer_notes">
                        </div>
                        <div class="col">
                            <label for="customer_image_one" class="form-label">Customer Photo</label>
                            <input class="form-control" type="file" name="customer_image_one" value="" />
                        </div>
                    </div>
            </div>
    </div>
    <br>
    <hr class="border border-primary border-3 opacity-75">
    <div class="text-center form-group">
        <input class="btn btn-primary button_width" type="submit" name="add_customer" value="Add Customer">
    </div>
    <br>
</form>
<script>
  $( function() {
    $( ".datepicker" ).datepicker({ changeMonth: true, changeYear: true, dateFormat: 'MM d yy', yearRange: "1924:2024" });
  } );
  </script>

