<?php

if (!is_admin($_SESSION['username'])) {

    header("Location: index.php");
}

if (isset($_POST['create_user'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    $user_password = password_hash($user_password,  PASSWORD_BCRYPT,  array('cost' => 10));

    // move_uploaded_file($user_image_temp,  "../images/$user_image");
    $query = "INSERT INTO users(username,  user_password,  user_firstname,  user_lastname,  user_email,  user_role) ";
    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}') ";
    $create_user_query = mysqli_query($connection,  $query);
    confirmQuery($create_user_query);
    echo "<p class='bg-success'>User Created: " . " " . "<a class='text-primary' href='users.php'>View Users</a></class=>";
}
?>
<h1 class="text-center">Add New User</h1>
<hr class="border border-primary border-3 opacity-75">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label><br>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <br>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <br>
    <div class="form-group">
        <label for="product_type" class="form-label">Role</label><br>
        <select class="form-select" name="user_role" id="user_role">
            <?php
            $query = "SELECT * FROM roles";
            $select_roles = mysqli_query($connection,  $query);
            confirmQuery($select_roles);
            while ($row = mysqli_fetch_assoc($select_roles)) {
                // $role_id = $row['role_id'];
                $role_title = $row['role_title'];
                echo "<option value='$role_title'>{$role_title}</option>";
            }
            ?>
        </select>
    </div>

    <br>
    <hr class="border border-primary border-3 opacity-75">
    <div div class="text-center mb-3">
        <input class="btn btn-primary button_width" type="submit" name="create_user" value="Add User">
    </div>

</form>