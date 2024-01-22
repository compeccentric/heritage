    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">
            <img src="/admin/images/heritage_logo_sm_01.png" style="background-color:white;" width="50" height="25" class="d-inline-block align-text-top"> Heritage Bicycles
        </a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <form action="search.php" method="get" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" name="search" placeholder="Product SKU..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <input class="btn btn-primary" type="submit" value="Search">
            </div>
        </form>


        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu mx-2">
                    <div style="padding-top:50px;" class="nav">
                        <h4 class="text-white">Products</h4>
                        <hr style="margin:0px 0px; color:white;border-width:1px;opacity:1;">
                        <a class=" nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsViewProduct" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"></div>
                            View Products by Brand/All
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsViewProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="products.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    All Products
                                </a>
                                <a class="nav-link" href="products.php?source=view_products&brand=dahon">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Dahon
                                </a>
                                <a class="nav-link" href="products.php?source=view_products&brand=scott">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Scott
                                </a>
                                <a class="nav-link" href="products.php?source=view_products&brand=specialized">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Specialized
                                </a>
                                <a class="nav-link" href="products.php?source=view_products&brand=marin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Marin
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsAddProduct" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"></div>
                            Add New Product by Brand
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsAddProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="products.php?source=add_product&brand=dahon">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Dahon
                                </a>
                                <a class="nav-link" href="products.php?source=add_product&brand=scott">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Scott
                                </a>
                                <a class="nav-link" href="products.php?source=add_product&brand=specialized">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Specialized
                                </a>
                                <a class="nav-link" href="products.php?source=add_product&brand=marin">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Marin
                                </a>
                            </nav>
                        </div>

                        <h4 class="text-white">Customers</h4>
                        <hr style="margin:0px 0px; color:white;border-width:1px;opacity:1;">
                        <a class=" nav-link" href="customers.php?source=view_all_customers.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            View All Customers
                        </a>
                        <a class=" nav-link" href="customers.php?source=add_customer">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            Add Customer
                        </a>
                        <h4 class="text-white">Specials</h4>
                        <hr style="margin:0px 0px; color:white;border-width:1px;opacity:1;">
                        <a class=" nav-link" href="specials.php?source=view_all_specials.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            View All Specials
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsSpecial" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"></div>
                            Add New Special by Brand
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutsSpecial" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="specials.php?source=add_special&brand=prv">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    PRV Audio
                                </a>
                                <a class="nav-link" href="specials.php?source=add_special&brand=tpt">
                                    <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                                    Timpano
                                </a>
                            </nav>
                        </div>
                        <h4 class="text-white">Shipping</h4>
                        <hr style="margin:0px 0px; color:white;border-width:1px;opacity:1;">
                        <a class=" nav-link" href="usps.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            Address Verification
                        </a>
                        <?php
                        if (is_admin($_SESSION['username'])) {
                            echo '<h4 class="text-white">Users</h4>
                        <hr style="margin:0px 0px; color:white;border-width:1px;opacity:1;"><a class="nav-link" href="users.php?source=view_all_users">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            View All Users
                        </a>
                        <a class="nav-link" href="users.php?source=add_user">
                            <div class="sb-nav-link-icon"><i class="fas fa-arrow-right"></i></div>
                            Add New User
                        </a>';
                        }
                        ?>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['username']; ?>
                </div>
            </nav>
        </div>