<?php

function users_online()
{

    if (isset($_GET['onlineusers'])) {

        global $connection;
        if (!$connection) {

            session_start();
            include("../includes/db.php");

            $session = session_id();
            $time = time();
            $time_out_in_seconds = 30;
            $time_out = $time - $time_out_in_seconds;

            $query = "SELECT * FROM users_online WHERE session = '$session'";
            $query_all_users = mysqli_query($connection,  $query);
            $user_count = mysqli_num_rows($query_all_users);

            if ($user_count == NULL) {
                mysqli_query($connection,  "INSERT INTO users_online(session, time) VALUES('$session',  '$time')");
            } else {
                mysqli_query($connection,  "UPDATE users_online SET time = '$time' WHERE session = '$session'");
            }
            $users_online_query = mysqli_query($connection,  "SELECT * FROM users_online WHERE time > '$time_out'");
            $count_user = mysqli_num_rows($users_online_query);
            echo $count_user;
        }
    } // get request isset()
}
users_online();

function confirmQuery($result)
{
    global $connection;
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    }
}

function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";
            $create_category_query = mysqli_query($connection,  $query);
            if (!$create_category_query) {
                die("QUERY FAILED ." . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories()
{
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,  $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deleteCategories()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection,  $query);
        header("Location: categories.php");
    }
}

function is_admin($username = '')
{

    global $connection;
    $query = "SELECT user_role FROM users WHERE username = '$username'";

    $result = mysqli_query($connection,  $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);
    if ($row['user_role'] == 'admin') {

        return true;
    } else {
        return false;
    }
}

function array_to_csv_download($array, $filename = "export.csv", $delimiter = ";")
{
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://output', 'w');
    // loop over the input array
    foreach ($array as $line) {
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    fseek($f, 0);
    // tell the browser it's going to be a csv file
    header('Content-Type: text/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}
