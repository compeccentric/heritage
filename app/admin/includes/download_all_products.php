<?php
if (isset($_POST['exportCSV'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=all_products.csv');
    $query = "SELECT * FROM products ORDER BY product_id ASC";
    $select_specials = mysqli_query($connection,  $query);




    ob_end_clean();

    $fp = fopen('php://output', 'w');
    fputcsv($fp, ['ID', 'Code', 'SKU', 'EcomDash', 'Name']);
    while ($row = mysqli_fetch_assoc($select_specials)) {
        fputcsv($fp, $row);
    }



    exit();
}
