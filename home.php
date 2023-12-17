<?php
//session_start();
if (empty($_SESSION['username'])) {
    header('location:halaman');
}
$fadli = 'profile';
include "proses/conect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user
WHERE username = '$_SESSION[username]'
");
$query2 = mysqli_query($conn, "SELECT * FROM tb_menu");


while ($record = mysqli_fetch_array($query2)) {
    $result[] = $record;
}

$select_user = mysqli_query(
    $conn,
    "SELECT * FROM tb_user"
);

$hasil = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome.hesoyam_cafe</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        :root {
            --primary: #b6895b;
            --bg: #010101;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg);
            color: #fff;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.4rem 7%;
            background-color: rgba(1, 1, 1, 0.8);
            border-bottom: 1px solid #513c28;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
        }

        .navbar .navbar-logo {
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            font-style: italic;
        }

        .navbar .navbar-logo span {
            color: var(--primary);
        }

        .navbar .navbar-nav a {
            color: #fff;
            display: inline-block;
            font-size: 1.3rem;
            margin: 0 1rem;
        }

        .menu-card-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            background-color: red;
        }

        .cta {
            margin-top: 1rem;
            margin-left: 8rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.4rem;
            color: #fff;
            background-color: var(--primary);
            border-radius: 0.5rem;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }

        .ctl {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            color: #fff;
            background-color: red;
            border-radius: 0.5rem;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }

        .navbar .navbar-nav a:hover {
            color: var(--primary);
        }

        .navbar .navbar-nav a::after {
            content: '';
            display: block;
            padding-bottom: 0.5rem;
            border-bottom: 0.1rem solid var(--primary);
            transform: scaleX(0);
            transition: 0.2s linear;
        }

        .tombolnavigasi {
            display: flex;
            align-items: center;
            height: 100vh;
            gap: 100px;
        }

        .navbar .navbar-nav a:hover::after {
            transform: scaleX(0.5);
        }

        .navbar .navbar-extra a {
            color: #fff;
            margin: 0 0.5rem;
        }

        .navbar .navbar-extra a:hover {
            color: var(--primary);
        }

        #hamburger-menu {
            display: none;
        }

        /* Navbar search form */
        .navbar .search-form {
            position: absolute;
            top: 100%;
            right: 7%;
            background-color: #fff;
            width: 50rem;
            height: 5rem;
            display: flex;
            align-items: center;
            transform: scaleY(0);
            transform-origin: top;
            transition: 0.3s;
        }

        .navbar .search-form.active {
            transform: scaleY(1);
        }

        .navbar .search-form input {
            height: 100%;
            width: 100%;
            font-size: 1.6rem;
            color: var(--bg);
            padding: 1rem;
        }

        .navbar .search-form label {
            cursor: pointer;
            font-size: 2rem;
            margin-right: 1.5rem;
            color: var(--bg);
        }

        /* Shopping Cart */
        .shopping-cart {
            position: absolute;
            top: 100%;
            right: -100%;
            height: 100vh;
            width: 35rem;
            padding: 0 1.5rem;
            background-color: #fff;
            color: var(--bg);
            transition: 0.3s;
        }

        .shopping-cart.active {
            right: 0;
        }

        .shopping-cart .cart-item {
            margin: 2rem 0;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed #666;
            position: relative;
        }

        .shopping-cart img {
            height: 6rem;
            border-radius: 50%;
        }

        .shopping-cart h3 {
            font-size: 1.6rem;
            padding-bottom: 0.5rem;
        }

        .shopping-cart .item-price {
            font-size: 1.2rem;
        }

        .shopping-cart .remove-item {
            position: absolute;
            right: 1rem;
            cursor: pointer;
        }

        .shopping-cart .remove-item:hover {
            color: var(--primary);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('img/header-bg.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
            -webkit-mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
            mask-image: linear-gradient(rgba(0, 0, 0, 1) 85%, rgba(0, 0, 0, 0));
        }



        .hero .mask-container {
            position: absolute;
            /* background: salmon; */
            inset: 0;
            -webkit-mask-image: url('img/header-bg.svg');
            -webkit-mask-repeat: no-repeat;
            -webkit-mask-size: cover;
            -webkit-mask-position: center;
        }

        .hero .content {
            padding: 1.4rem 7%;
            /* max-width: 60rem; */
            width: 100%;
            text-align: center;
            position: fixed;
            top: 130px;
        }

        .hero .content h1 {
            font-size: 5em;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
            line-height: 1.2;
        }

        .hero .content h1 span {
            color: red;
        }

        .hero .content p {
            font-size: 1.6rem;
            margin-top: 1rem;
            line-height: 1.4;
            font-weight: 100;
            text-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
            mix-blend-mode: difference;
        }

        .hero .content .cta {
            margin-top: 1rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.4rem;
            color: #fff;
            background-color: var(--primary);
            border-radius: 0.5rem;
            box-shadow: 1px 1px 3px rgba(1, 1, 3, 0.5);
        }

        /* About Section */
        .about,
        .menu,
        .products,
        .contact {
            padding: 8rem 7% 1.4rem;
        }

        .about h2,
        .menu h2,
        .products h2,
        .contact h2 {
            text-align: center;
            font-size: 2.6rem;
            margin-bottom: 3rem;
        }

        .about h2 span,
        .menu h2 span,
        .products h2 span,
        .contact h2 span {
            color: var(--primary);
        }

        .about .row {
            display: flex;
        }

        .about .row .about-img {
            flex: 1 1 45rem;
        }

        .about .row .about-img img {
            width: 100%;
            -webkit-mask-image: url('img/menu/splash.svg');
            -webkit-mask-size: 50%;
            -webkit-mask-repeat: no-repeat;
            -webkit-mask-position: center;
        }

        .about .row .content {
            flex: 1 1 35rem;
            padding: 0 1rem;
        }

        .about .row .content h3 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .about .row .content p {
            margin-bottom: 0.8rem;
            font-size: 1.3rem;
            font-weight: 100;
            line-height: 1.6;
        }

        /* Menu Section */
        .menu h2,
        .products h2,
        .contact h2 {
            margin-bottom: 1rem;
        }

        .menu p,
        .products p,
        .contact p {
            text-align: center;
            max-width: 30rem;
            margin: auto;
            font-weight: 100;
            line-height: 1.6;
        }

        .menu .row {
            display: flex;
            flex-wrap: wrap;
            margin-top: 5rem;
            justify-content: center;
        }

        .menu .row .menu-card {
            text-align: center;
            padding-bottom: 4rem;
        }

        .menu .row .menu-card img {
            border-radius: 50%;
            width: 80%;
        }

        .menu .row .menu-card .menu-card-title {
            margin: 1rem auto 0.5rem;
        }

        /* Products Section */
        .products .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 1.5rem;
            margin-top: 4rem;
        }

        .products .product-card {
            text-align: center;
            border: 1px solid #666;
            padding: 2rem;
        }

        .products .product-icons {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .products .product-icons a {
            width: 4rem;
            height: 4rem;
            color: #fff;
            margin: 0.3rem;
            border: 1px solid #666;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .products .product-icons a:hover {
            background-color: var(--primary);
            border: 1px solid var(--primary);
        }

        .products .product-image {
            padding: 1rem 0;
        }

        .products .product-image img {
            height: 25rem;
        }

        .products .product-content h3 {
            font-size: 2rem;
        }

        .products .product-stars {
            font-size: 1.7rem;
            padding: 0.8rem;
            color: var(--primary);
        }

        .products .product-stars .star-full {
            fill: var(--primary);
        }

        .products .product-price {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .products .product-price span {
            text-decoration: line-through;
            font-weight: lighter;
            font-size: 1rem;
        }

        /* Contact Section */
        .contact .row {
            display: flex;
            margin-top: 2rem;
            background-color: #222;
        }

        .contact .row .map {
            flex: 1 1 45rem;
            width: 100%;
            object-fit: cover;
        }

        .contact .row form {
            flex: 1 1 45rem;
            padding: 5rem 2rem;
            text-align: center;
        }

        .contact .row form .input-group {
            display: flex;
            align-items: center;
            margin-top: 2rem;
            background-color: var(--bg);
            border: 1px solid #eee;
            padding-left: 2rem;
        }

        .contact .row form .input-group input,
        .contact .row form .input-group select {
            width: 100%;
            padding: 2rem;
            font-size: 1.7rem;
            background: none;
            color: #fff;
        }

        .contact .row form .btn {
            margin-top: 3rem;
            display: inline-block;
            padding: 1rem 3rem;
            font-size: 1.7rem;
            color: #fff;
            background-color: var(--primary);
            cursor: pointer;
        }

        /* Footer */
        footer {
            background-color: var(--primary);
            text-align: center;
            padding: 1rem 0 3rem;
            margin-top: 3rem;
        }

        footer .socials {
            padding: 1rem 0;
        }

        footer .socials a {
            color: #fff;
            margin: 1rem;
        }

        footer .socials a:hover,
        footer .links a:hover {
            color: var(--bg);
        }

        footer .links {
            margin-bottom: 1.4rem;
        }

        footer .links a {
            color: #fff;
            padding: 0.7rem 1rem;
        }

        footer .credit {
            font-size: 0.8rem;
        }

        footer .credit a {
            color: var(--bg);
            font-weight: 700;
        }

        /* Modal Box */
        /* Item Detail */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-container {
            position: relative;
            background-color: #fefefe;
            color: var(--bg);
            margin: 15% auto;
            padding: 1.2rem;
            border: 1px solid #666;
            width: 80%;
            animation: animateModal 0.5s;
        }

        /* Modal Animation */
        @keyframes animateModal {
            from {
                top: -300px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        .modal-container .close-icon {
            position: absolute;
            right: 1rem;
        }

        .modal-content {
            display: flex;
            flex-wrap: nowrap;
        }

        .modal-content img {
            height: 20rem;
            margin-right: 2rem;
            margin-bottom: 2rem;
        }

        .modal-content p {
            font-size: 1.2rem;
            line-height: 1.8rem;
            margin-top: 1.2rem;
        }

        .modal-content a {
            display: flex;
            gap: 1rem;
            width: 12rem;
            background-color: var(--primary);
            color: #fff;
            margin-top: 1rem;
            padding: 1rem 1.6rem;
        }

        #typing {
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }


        /* Media Queries */
        /* Laptop */
        @media (max-width: 1366px) {
            html {
                font-size: 75%;
            }
        }

        /* Tablet */
        @media (max-width: 758px) {
            html {
                font-size: 62.5%;
            }

            #hamburger-menu {
                display: inline-block;
            }

            .navbar .navbar-nav {
                position: absolute;
                top: 100%;
                right: -100%;
                background-color: #fff;
                width: 30rem;
                height: 100vh;
                transition: 0.3s;
            }

            .navbar .navbar-nav.active {
                right: 0;
            }

            .navbar .navbar-nav a {
                color: var(--bg);
                display: block;
                margin: 1.5rem;
                padding: 0.5rem;
                font-size: 2rem;
            }

            .navbar .navbar-nav a::after {
                transform-origin: 0 0;
            }

            .navbar .navbar-nav a:hover::after {
                transform: scaleX(0.2);
            }

            .navbar .search-form {
                width: 90%;
                right: 2rem;
            }

            .about .row {
                flex-wrap: wrap;
            }

            .about .row .about-img img {
                height: 24rem;
                object-fit: cover;
                object-position: center;
            }

            .about .row .content {
                padding: 0;
            }

            .about .row .content h3 {
                margin-top: 1rem;
                font-size: 2rem;
            }

            .about .row .content p {
                font-size: 1.6rem;
            }

            .menu p {
                font-size: 1.2rem;
            }

            .contact .row {
                flex-wrap: wrap;
            }

            .contact .row .map {
                height: 30rem;
            }

            .contact .row form {
                padding-top: 0;
            }

            .modal-content {
                flex-wrap: wrap;
            }
        }

        /* Mobile Phone */
        @media (max-width: 450px) {
            html {
                font-size: 55%;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar start -->
    <nav class="navbar">
        <a href="#" class="navbar-logo">HESOYAM<span>_</span>CAFFE</a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="logout">
            <a href="logout " class="ctl">LogOut</a>

        </div>



    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
        <div class="mask-container">
            <div class="tombolnavigasi">

                <main class="content">
                    <h2>Wellcome <?php echo $hasil['nama'] ?></h2>

                    <h1 id="typing">Solusi Nugas<span> Nyantai</span></h1>
                    <p>Untuk Menambah Nyawa Anda</p>
                </main>
                <?php
                if ($hasil['level'] == 5) {

                    echo '<a href="orderuser" class="cta">Beli Sekarang</a>';
                } elseif ($hasil['level'] == 4) {
                    echo '<a href="dapur" class="cta">Halaman Karyawan</a>';
                } else {
                    echo '<a href="order" class="cta">Halaman Karyawan</a>';
                }
                ?>
            </div>
        </div>
    </section>


    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="about">
        <h2><span>Tentang</span> Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="img/tentang-kami.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Harus Hessoyam Caffe</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur ducimus voluptatum dolor. Et, voluptatum
                    accusantium!</p>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic deserunt iure amet facilis eos a quo cum
                    voluptates molestias nihil.</p>
            </div>
        </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="menu">
        <h2><span>Menu</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Expedita, repellendus numquam quam tempora voluptatum.
        </p>


        <div class="row">
            <?php

            foreach ($result as $row) {

            ?>

                <div class="menu-card" style="margin-left: 50px;">
                    <img src="asset/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="Espresso" class="menu-card-img">
                    <h3 class="menu-card-title">- <?php echo $row['nama_menu'] ?> -</h3>
                    <p class="menu-card-price">IDR <?php echo $row['harga'] ?></p>
                </div>
            <?php } ?>
        </div>



    </section>
    <!-- Menu Section end -->


    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.
        </p>

        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%20City%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1672408575523!5m2!1sen!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" placeholder="nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="text" placeholder="email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" placeholder="no hp">
                </div>
                <button type="submit" class="btn">kirim pesan</button>
            </form>

        </div>
    </section>
    <!-- Contact Section end -->


    <!-- Contact Section start -->
    <section id="contact" class="contact">
        <h2><span>Report Dan Masukan</span><br>HesoyamCafe</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, provident.
        </p>

        <div class="row">

            <form action="proses/proses_report_user.php" method="POST" novalidate>
                <div class="input-group">
                    <i data-feather="user"></i>
                    <select class="form-select" name="karyawan" id="">
                        <option value="" selected>karyawan</option>
                        <?php
                        foreach ($select_user as $value) {
                            if ($value['level'] != 5) {
                                echo "<option style='background-color: rgba(1, 1, 1, 0.8);' value={$value['nama']}>{$value['nama']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input name="keluhan" type="text" placeholder="Keluhan">
                </div>
                <button type="submit" name="report" class="btn">kirim pesan</button>
            </form>

        </div>
    </section>
    <!-- Contact Section end -->


    <!-- Footer start -->
    <footer>
        <div class="socials">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>

        <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#menu">Menu</a>
            <a href="#contact">Kontak</a>
        </div>

        <div class="credit">
            <p>Created by <a href="">sandhikagalih</a>. | &copy; 2023.</p>
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
        <div class="modal-container">
            <a href="#" class="close-icon"><i data-feather="x"></i></a>
            <div class="modal-content">
                <img src="img/products/1.jpg" alt="Product 1">
                <div class="product-content">
                    <h3>Product 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident, tenetur cupiditate facilis obcaecati
                        ullam maiores minima quos perspiciatis similique itaque, esse rerum eius repellendus voluptatibus!</p>
                    <div class="product-stars">
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star" class="star-full"></i>
                        <i data-feather="star"></i>
                    </div>
                    <div class="product-price">IDR 30K <span>IDR 55K</span></div>
                    <a href="#"><i data-feather="shopping-cart"></i> <span>add to cart</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Box Item Detail end -->



    <!-- Feather Icons -->
    <script>
        feather.replace()
    </script>

    <!-- My Javascript -->
    <script>
        // Toggle class active untuk hamburger menu
        const navbarNav = document.querySelector('.navbar-nav');
        // ketika hamburger menu di klik
        document.querySelector('#hamburger-menu').onclick = () => {
            navbarNav.classList.toggle('active');
        };

        // Toggle class active untuk search form
        const searchForm = document.querySelector('.search-form');
        const searchBox = document.querySelector('#search-box');

        document.querySelector('#search-button').onclick = (e) => {
            searchForm.classList.toggle('active');
            searchBox.focus();
            e.preventDefault();
        };

        // Toggle class active untuk shopping cart
        const shoppingCart = document.querySelector('.shopping-cart');
        document.querySelector('#shopping-cart-button').onclick = (e) => {
            shoppingCart.classList.toggle('active');
            e.preventDefault();
        };

        // Klik di luar elemen
        const hm = document.querySelector('#hamburger-menu');
        const sb = document.querySelector('#search-button');
        const sc = document.querySelector('#shopping-cart-button');

        document.addEventListener('click', function(e) {
            if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
                navbarNav.classList.remove('active');
            }

            if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
                searchForm.classList.remove('active');
            }

            if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
                shoppingCart.classList.remove('active');
            }
        });

        // Modal Box
        const itemDetailModal = document.querySelector('#item-detail-modal');
        const itemDetailButtons = document.querySelectorAll('.item-detail-button');

        itemDetailButtons.forEach((btn) => {
            btn.onclick = (e) => {
                itemDetailModal.style.display = 'flex';
                e.preventDefault();
            };
        });

        // klik tombol close modal
        document.querySelector('.modal .close-icon').onclick = (e) => {
            itemDetailModal.style.display = 'none';
            e.preventDefault();
        };

        // klik di luar modal
        window.onclick = (e) => {
            if (e.target === itemDetailModal) {
                itemDetailModal.style.display = 'none';
            }
        };
    </script>
</body>

</html>