<nav class="navbar navbar-expand bg-primary navbar-dark">
    <div class="container">

        <a class="navbar-brand <?php echo (isset($_GET['x']) && $_GET['x'] == 'home') ?> active link-light" href="home"><i class="bi bi-cup-hot me-2"></i>Hesoyam cofe</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> welcome <i><?php echo $hasil['nama'], $hasil['level']; ?></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3">
                        <li><a class="dropdown-item" href="profile"><i class="bi bi-person-circle"></i> <?php echo $fadli ?></a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalubahpassword"><i class="bi bi-key"></i> Ubah password<a></li>
                        <li><a class="dropdown-item" href="logout"><i class="bi bi-box-arrow-left"></i> LogOut</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="modalubahpassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ubah password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="proses/proses_ubah_password.php" method="POST" class="needs-validation" novalidate>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input disabled required name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $_SESSION['username']; ?>">
                                <label for="floatingInput">user Name</label>
                                <div class="invalid-feedback">
                                    Emailnya dongggg -_-
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required name="passwordlama" type="password" class="form-control" id="floatingPassword">
                                <label for="floatingPassword">Password lama</label>
                                <div class="invalid-feedback">
                                    gak boleh kosong
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input required name="passwordbaru" type="password" class="form-control" id="floatingInput">
                                <label for="floatingInput">Password baru</label>
                                <div class="invalid-feedback">
                                    masukan password baru
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <div class="form-floating mb-3">
                                <input required name="konfirmasi" type="password" class="form-control" id="floatingPassword">
                                <label for="floatingPassword">konfirmasi password baru</label>
                                <div class="invalid-feedback">
                                    gak boleh kosong
                                </div>
                            </div>

                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="sumbitubahpassword" value="1234">Understood</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>