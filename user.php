<?php
include 'proses/conect.php';
$query = mysqli_query($conn, "SELECT * FROM tb_user");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            User
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col  d-flex justify-content-end">
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah User</button>
                </div>
            </div>
            <!-- modal tambah user -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah user</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_input_user.php" method="POST" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input name="nama" type="text" class="form-control" id="floatingInput" placeholder="namamu :)" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Ga Punya nama ya??
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>

                                            <label for="floatingInput">user Name</label>
                                            <div class="invalid-feedback">
                                                Emailnya dongggg -_-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select name="level" class="form-select" aria-label="Default select example" required>
                                                <option selected hidden value="">level userr</option>
                                                <option value="1">Owner</option>
                                                <option value="2">Kasir</option>
                                                <option value="3">Pelayan</option>
                                                <option value="4">dapur</option>
                                            </select>
                                            <label for="floatingInput">level uaser</label>
                                            <div class="invalid-feedback">
                                                pangkatmu apahh
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-floating mb-3">
                                            <input name="nohp" type="number" class="form-control" id="floatingInput" placeholder="08********" required>
                                            <label for="floatingInput">No Hp</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input name="password" type="password" class="form-control" id="floatingInput" placeholder="Password" value="password" required>
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">
                                                Lahhh.. Passwordnya mana??
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat" id="" style="height:100px;" required></textarea>
                                    <label for="floatingPassword">Alamat</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="sumbituser" value="1234">Understood</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end tambah user -->
            <!-- modal view -->
            <?php
            foreach ($result as $row) {


            ?>

                <div class="modal fade" id="modalview<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">lihat user</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses_input_user.php" method="POST" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled name="nama" type="text" class="form-control" id="floatingInput" placeholder="namamu :)" value="<?php echo $row['nama']; ?>">
                                                <label for="floatingInput">Nama </label>
                                                <div class="invalid-feedback">
                                                    Ga Punya nama ya??
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input disabled name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['username']; ?>">
                                                <label for="floatingInput">user Name</label>
                                                <div class="invalid-feedback">
                                                    Emailnya dongggg -_-
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select disabled name="level" class="form-select" aria-label="Default select example" required>
                                                    <?php
                                                    $data = array("owner", "kasir", "pelayan", "dapur");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['level'] == $key + 1) {
                                                            echo "<option selected value='$key'>$value</option>";
                                                        } else {
                                                            echo "<option value='$key'>$value</option>";
                                                        };
                                                    };
                                                    ?>

                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input disabled name="nohp" type="number" class="form-control" id="floatingInput" placeholder="08********" value="<?php echo $row['notelepon']; ?>">
                                                <label for="floatingInput">No Hp</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating">
                                        <textarea disabled class="form-control" name="alamat" id="" style="height:100px;" <?php echo $row['alamat']; ?>></textarea>
                                        <label for="floatingPassword">Alamat</label>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end view  -->

                <!-- modal edit -->
                <div class="modal fade" id="modaledit<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">edit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses_edit_user.php" method="POST" class="needs-validation" novalidate>
                                    <input type="hidden" value="<?php echo ($row['id']); ?>" name="id">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input required name="nama" type="text" class="form-control" id="floatingInput" placeholder="namamu :)" value="<?php echo $row['nama']; ?>">
                                                <label for="floatingInput">Nama <?php var_dump($row['id']); ?></label>
                                                <div class="invalid-feedback">
                                                    Ga Punya nama ya??
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input <?php echo ($row['username'] == $_SESSION['username']) ? 'disabled' : '';  ?> required name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo $row['username']; ?>">
                                                <label for="floatingInput">user Name</label>
                                                <div class="invalid-feedback">
                                                    Emailnya dongggg -_-
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <select name="level" class="form-select" aria-label="Default select example" required>
                                                    <?php
                                                    $data = array("owner", "kasir", "pelayan", "dapur");
                                                    foreach ($data as $key => $value) {
                                                        if ($row['level'] == $key + 1) {
                                                            echo "<option selected value=" . ($key + 1) . ">$value</option>";
                                                        } else {
                                                            echo "<option value=" . ($key + 1) . ">$value</option>";
                                                        };
                                                    };
                                                    ?>

                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="form-floating mb-3">
                                                <input name="nohp" type="number" class="form-control" id="floatingInput" placeholder="08********" value="<?php echo $row['notelepon']; ?>">
                                                <label for="floatingInput">No Hp</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-floating">
                                        <textarea required class="form-control" name="alamat" id="" style="height:100px;" <?php echo $row['alamat']; ?>></textarea>
                                        <label for="floatingPassword">Alamat</label>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-primary" name="sumbituser" value="1234">Understood</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end modal edit -->
                <!-- modal delete -->
                <div class="modal fade" id="modaldelete<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">delete</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses_delete.php" method="POST" class="needs-validation" novalidate>
                                    <input type="hidden" value="<?php echo ($row['id']); ?>" name="id">
                                    <div class="colo-l-6">
                                        apakah anda yakin ingin menghapus user <b><?php echo $row['nama'] ?></b>??
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="delete">hapus</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end modal delete -->
                <!-- modal reset -->
                <div class="modal fade" id="modalreset<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">reset password</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses/proses_reset.php" method="POST" class="needs-validation" novalidate>
                                    <input type="hidden" value="<?php echo ($row['id']); ?>" name="id">
                                    <div class="colo-l-6">
                                        apakah anda yakin ingin mereset user <b><?php echo $row['nama'] ?></b> dengan <b>password</b>??
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="reset">reset</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- modal reset end -->
            <?php
            }
            $no = 1;
            if (empty($result)) {
                echo "data user tidak ada";
            } else {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">nama</th>
                                <th scope="col">username</th>
                                <th scope="col">level</th>
                                <th scope="col">No hp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($result as $row) {


                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no++;  ?></th>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php $level = $row['level'];

                                        if ($level == 1) {
                                            echo 'owner';
                                        } else if ($level == 2) {
                                            echo 'kasir';
                                        } else if ($level == 3) {
                                            echo 'pelayan';
                                        } else if ($level == 4) {
                                            echo 'dapur';
                                        } else {
                                            echo 'ada yang salah';
                                        }
                                        ?></td>
                                    <td><?php echo $row['notelepon'] ?></td>
                                    <td class="d-flex" style="gap: 10px;">
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalview<?php echo $row['id']; ?>"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalreset<?php echo $row['id']; ?>"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>