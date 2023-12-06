<?php
include 'proses/conect.php';
$query = mysqli_query($conn, "SELECT * FROM tb_menu
        LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_kat_menu = tb_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT * FROM tb_kategori_menu");
?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col  d-flex justify-content-end">
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Tambah Menu</button>
                </div>
            </div>
            <!-- modal tambah menu baru -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/input_menu.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input name="foto" type="file" class="form-control py-3" id="uploadFoto" placeholder="namamu :)" required>
                                            <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan file foto menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input name="nama_menu" type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" required>

                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input name="keterangan" type="text" class="form-control" id="floatingInput" placeholder="Keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select name="kategori" class="form-select" aria-label="Default select example" required>
                                                <option selected hidden value="">Pilih Kategori Menu</option>
                                                <?php
                                                foreach ($select_kat_menu as $value) {
                                                    echo "<option value=" . $value['id_kat_menu'] . ">" . $value['kategori_menu'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan atau Minuman
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <input name="harga" type="number" class="form-control" id="floatingInput" placeholder="harga" required>
                                            <label for="floatingInput">Harga</label>
                                            <div class="invalid-feedback">
                                                Masukkan Harga Menu
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-floating mb-3">
                                        <input name="stok" type="number" class="form-control" id="floatingInput" placeholder="Stok" required>
                                        <label for="floatingInput">Stok</label>
                                        <div class="invalid-feedback">
                                            Masukkan Stok
                                        </div>
                                    </div>
                                </div>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="sumbit" class="btn btn-primary" name="inputmenu" value="1234">Understood</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

            <!-- end tambah menu baru -->
            <?php
            if (empty($result)) {
                echo "data menu tidak ada";
            } else {
                foreach ($result as $row) {


            ?>
                    <!-- modal view -->

                    <div class="modal fade" id="modalview<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/input_menu.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['nama_menu'] ?>">

                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Nama Menu
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_menu']) {
                                                                echo "<option selected value=" . $value['id_kat_menu'] . ">" . $value['kategori_menu'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kat_menu'] . ">" . $value['kategori_menu'] . "</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Makanan atau Minuman
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input disabled type="number" class="form-control" id="floatingInput" placeholder="harga" value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Menu
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input disabled="number" class="form-control" id="floatingInput" placeholder="Stok" value="<?php echo $row['stok'] ?>">
                                                <label for="floatingInput">Stok</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok
                                                </div>
                                            </div>
                                        </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="inputmenu" value="1234">Understood</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <!-- end view  -->

                    <!-- modal edit -->
                    <div class="modal fade" id="modaledit<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/proses_edit_menu.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input name="foto" type="file" class="form-control py-3" id="uploadFoto" placeholder="namamu :)" required>
                                                    <label class="input-group-text" for="uploadFoto">Upload Foto Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukan file foto menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input name="nama_menu" type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" required value="<?php echo $row['nama_menu'] ?>">

                                                    <label for="floatingInput">Nama Menu</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Nama Menu
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input name="keterangan" type="text" class="form-control" id="floatingInput" placeholder="Keterangan" value="<?php echo $row['keterangan'] ?>">
                                                    <label for="floatingPassword">Keterangan</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <select name="kategori" class="form-select" aria-label="Default select example">
                                                        <option selected hidden value="">Pilih Kategori Menu</option>
                                                        <?php
                                                        foreach ($select_kat_menu as $value) {
                                                            if ($row['kategori'] == $value['id_kat_menu']) {
                                                                echo "<option selected value=" . $value['id_kat_menu'] . ">" . $value['kategori_menu'] . "</option>";
                                                            } else {
                                                                echo "<option value=" . $value['id_kat_menu'] . ">" . $value['kategori_menu'] . "</option>";
                                                            }
                                                        }
                                                        ?>

                                                    </select>
                                                    <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                                    <div class="invalid-feedback">
                                                        Pilih Kategori Makanan atau Minuman
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input name="harga" type="number" class="form-control" id="floatingInput" placeholder="harga" required value="<?php echo $row['harga'] ?>">
                                                    <label for="floatingInput">Harga</label>
                                                    <div class="invalid-feedback">
                                                        Masukkan Harga Menu
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-floating mb-3">
                                                <input name="stok" type="number" class="form-control" id="floatingInput" placeholder="Stok" required value="<?php echo $row['stok'] ?>">>
                                                <label for="floatingInput">Stok</label>
                                                <div class="invalid-feedback">
                                                    Masukkan Stok
                                                </div>
                                            </div>
                                        </div>
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="inputmenu" value="1234">Understood</button>
                                </div>
                                </form>
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
                                    <form action="proses/delete_menu.php" method="POST" class="needs-validation" novalidate>
                                        <input type="hidden" value="<?php echo ($row['id']); ?>" name="id">
                                        <input type="hidden" value="<?php echo ($row['foto']); ?>" name="foto">
                                        <div class="colo-l-6">
                                            apakah anda yakin ingin menghapus Menu <b><?php echo $row['nama_menu'] ?></b>??
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

                ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">foto menu</th>
                                <th scope="col">nama Menu</th>
                                <th scope="col">keterangan</th>
                                <th scope="col">kategori</th>
                                <th scope="col">jenis menu</th>
                                <th scope="col">harga</th>
                                <th scope="col">stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($result as $row) {


                            ?>
                                <tr class="text-nowrap">
                                    <th scope="row"><?php echo $no++;  ?></th>
                                    <td><img src="asset/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="..." width="100px"></td>
                                    <td><?php echo $row['nama_menu'] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
                                    <td><?php echo $row['kategori_menu'] ?></td>
                                    <td><?php echo ($row['jenis'] == 1) ? "makanan" : "minuman" ?></td>
                                    <td><?php echo $row['harga'] ?></td>
                                    <td><?php echo $row['stok'] ?></td>
                                    <td class="">
                                        <div class="d-flex" style="gap: 10px;">
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalview<?php echo $row['id']; ?>"><i class="bi bi-eye"></i></button>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id']; ?>"><i class="bi bi-trash"></i></button>
                                        </div>
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