
            <?php
            session_start();
            if ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) {
                include "home.php";
                // include "main.php";
            } else if (isset($_GET['x']) && $_GET['x'] == 'order') {
                if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3) {
                    $page = "order.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } else if (isset($_GET['x']) && $_GET['x'] == 'orderuser') {
                if ($_SESSION['level'] == 1 || $_SESSION['level'] == 5) {
                    $page = "orderuser.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } else if (isset($_GET['x']) && $_GET['x'] == 'profile') {
                $page = "profile.php";
                include "main.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'user') {
                if ($_SESSION['level'] == 1) {
                    $page = "user.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'dapur') {
                if ($_SESSION['level'] == 4 || $_SESSION['level'] == 1) {
                    $page = "dapur.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'report') {
                if ($_SESSION['level'] == 1) {
                    $page = "report.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } elseif (isset($_GET['x']) && $_GET['x'] == 'menu') {
                if ($_SESSION['level'] == 1) {
                    $page = "menu.php";
                    include "main.php";
                } else {
                    include "home.php";
                }
            } else if (isset($_GET['x']) && $_GET['x'] == 'halaman') {
                include "halamanutama.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
                include "login.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
                include "proses/proses_logout.php";
            } elseif (isset($_GET['x']) && $_GET['x'] == 'orderitem') {
                if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2 || $_SESSION['level'] == 3 || $_SESSION['level'] == 5) {
                    $page = "order_item.php";
                    include "main.php";
                }
            } else {
                include "home.php";
            }
            ?>