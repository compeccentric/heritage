<?php ob_start(); ?>
<?php include "../includes/db.php" ?>
<?php include "functions.php"; ?>
<?php session_start(); ?>

<?php
if (!isset($_SESSION['user_role'])) {
    header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,  initial-scale=1,  shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Heritage Bicycles</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
    <link href="/css/custom.css" rel="stylesheet" />
    <link href="/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    <!-- <div id='load-screen'>
        <div id='loading'></div>
    </div> -->