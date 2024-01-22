<?php include "includes/admin_header.php"; ?>
<?php include "includes/admin_navigation.php"; ?>

<div id="layoutSidenav_content">
    <main>
        <div style="padding-top:20px;" class="container-fluid px-4">
            <div class="row py-5 row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card pt-3 h-100 shadow-lg">
                        <img src="images/brand_logos/dahon.png" class="card-img-top px-3" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="card-title">PRV Audio</h5> -->
                            <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                        </div>
                        <div class="card-footer">
                            <?php
                            $query = "SELECT * FROM products WHERE product_brand='Dahon'";
                            $select_products = mysqli_query($connection,  $query);
                            $product_count = mysqli_num_rows($select_products);
                            ?>
                            <h2 style="text-align:center;font-weight:700;"><?php echo $product_count ?> PRODUCTS</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card pt-3 h-100 shadow-lg">
                        <img src="images/brand_logos/scott.png" class="card-img-top px-3" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="card-title">PRV Audio</h5> -->
                            <!-- <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> -->
                        </div>
                        <div class="card-footer">
                            <?php
                            $query = "SELECT * FROM products WHERE product_brand='Scott'";
                            $select_products = mysqli_query($connection,  $query);
                            $product_count = mysqli_num_rows($select_products);
                            ?>
                            <h2 style="text-align:center;font-weight:700;"><?php echo $product_count ?> PRODUCTS</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card pt-3 h-100 shadow-lg">
                        <img src="images/brand_logos/specialized.png" class="card-img-top px-3" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Timpano Audio</h5> -->
                            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                        </div>
                        <div class="card-footer">
                            <?php
                            $query = "SELECT * FROM products WHERE product_brand='Specialized'";
                            $select_products = mysqli_query($connection,  $query);
                            $product_count = mysqli_num_rows($select_products);
                            ?>
                            <h2 style="text-align:center;font-weight:700;"><?php echo $product_count ?> PRODUCTS</h2>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card pt-3 h-100 shadow-lg">
                        <img src="images/brand_logos/marin.png" class="card-img-top px-3" alt="...">
                        <div class="card-body">
                            <!-- <h5 class="card-title">HR Audio</h5> -->
                            <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> -->
                        </div>
                        <div class="card-footer">
                            <?php
                            $query = "SELECT * FROM products WHERE product_brand='Marin'";
                            $select_products = mysqli_query($connection,  $query);
                            $product_count = mysqli_num_rows($select_products);
                            ?>
                            <h2 style="text-align:center;font-weight:700;"><?php echo $product_count ?> PRODUCTS</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-5 d-flex justify-content-center">
                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
            </div>
            <?php
            $query = "SELECT * FROM products WHERE product_brand='Dahon'";
            $select_products = mysqli_query($connection,  $query);
            $dahon_count = mysqli_num_rows($select_products);

            $query = "SELECT * FROM products WHERE product_brand='Scott'";
            $select_products = mysqli_query($connection,  $query);
            $scott_count = mysqli_num_rows($select_products);

            $query = "SELECT * FROM products WHERE product_brand='Specialized'";
            $select_products = mysqli_query($connection,  $query);
            $specialized_count = mysqli_num_rows($select_products);

            $query = "SELECT * FROM products WHERE product_brand='Marin'";
            $select_products = mysqli_query($connection,  $query);
            $marin_count = mysqli_num_rows($select_products);
            ?>


            <script>
                var xValues = ["Dahon", "Scott", "Specialized","Marin"];
                var yValues = [<?php echo $dahon_count ?>, <?php echo $scott_count ?>, <?php echo $specialized_count ?>, <?php echo $marin_count ?>];
                var barColors = [
                    "#04316d",
                    "#000000",
                    "#fe0115",
                    "#319fda"
                ];

                new Chart("myChart", {
                    type: "pie",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: "Heritage Bicycle Products"
                        }
                    }
                });
            </script>
    </main>
    <?php include "includes/admin_footer.php"; ?>