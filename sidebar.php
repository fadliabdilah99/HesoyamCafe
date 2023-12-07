<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-lg-3 ">
        <!-- side barr -->
        <nav class="navbar navbar-expand-lg bg-body-primary border rounded-3 mt-2 st sticky-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div style="width: 250px;" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1 ">
                            <li class="nav-item">
                                <a class="nav-link <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light' :
                                                        'link-dark' ?>ps-2" aria-current="page" href="home"><i class="bi bi-house"></i> Dasboard</a>
                            </li>
                            <?php if ($hasil['level'] == 1 || $hasil['level'] ==  3 || $hasil['level'] ==  2) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active link-light' : 'b';
                                                        'link-dark' ?> ps-2" href="menu"><i class="bi bi-card-checklist"></i> Daftar Menu</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'order') ? 'active link-light' : 'b';
                                                        'link-dark' ?> ps-2" href="order"><i class="bi bi-cart2"></i> Order</a>
                                </li>
                            <?php } ?>
                            <?php if ($hasil['level'] == 4 || $hasil['level'] == 1) { ?>
                                <li class="nav-item">

                                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'dapur') ? 'active link-light' : 'b';
                                                        'link-dark' ?> ps-2" href="dapur"><i class="bi bi-person-circle"></i> dapur</a>
                                </li>
                            <?php } ?>

                            <?php if ($hasil['level'] == 1) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light' : 'b';
                                                        'link-dark' ?> ps-2" href="user"><i class="bi bi-menu-button-wide"></i> User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light' : 'b';
                                                        'link-dark' ?> ps-2" href="report"><i class="bi bi-cone-striped" x=report></i> Report</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>