<?php
include 'proses/conect.php';
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order
        LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
        LEFT JOIN tb_list_order on tb_list_order.order = tb_order.id_order
        LEFT JOIN tb_bayar on tb_bayar.id_bayar = tb_order.id_order 
        LEFT JOIN tb_menu on tb_menu.id = tb_list_order.menu
        GROUP BY id_order order by waktu_order desc");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

// $select_kat_menu = mysqli_query($conn, "SELECT * FROM tb_kategori_menu");
?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Menu
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col  d-flex justify-content-end">
                    <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop">Order</button>
                </div>
            </div>
            <!-- modal tambah order baru -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">order Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/proses_input_order.php" method="POST" class="needs-validation" novalidate>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                            <input name="kode_order" type="text" class="form-control " id="uploadFoto" value="<?php echo date('dHi') . rand(10, 99) ?>" readonly>
                                            <label for="uploadFoto">kode order</label>
                                            <div class="invalid-feedback">
                                                Masukan kode order
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input name="meja" type="number" class="form-control" id="meja" placeholder="nomeja" required>

                                            <label for="meja">No meja</label>
                                            <div class="invalid-feedback">
                                                masukan no meja
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input name="pelanggan" type="text" class="form-control" id="pelanggan" placeholder="namapelanggan" required>

                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input name="catatan" type="text" class="form-control" id="catatan" placeholder="catatan">
                                            <label for="catatan">catatan</label>
                                        </div>
                                    </div>
                                </div>







                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="inputorder" value="1234">buat order</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- end tambah ordeer baru -->
            <?php
            if (empty($result)) {
                echo "data menu tidak ada";
            } else {
                foreach ($result as $row) {


            ?>


                    <!-- modal edit -->
                    <div class="modal fade" id="modaledit<?php echo $row['id_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit orderan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/proses_edit_order.php" method="POST" class="needs-validation" novalidate>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input name="kode_order" type="text" class="form-control " id="uploadFoto" value="<?php echo $row['id_order'] ?>" readonly>
                                                    <label for="uploadFoto">kode order</label>
                                                    <div class="invalid-feedback">
                                                        Masukan kode order
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input name="meja" type="number" class="form-control" id="meja" placeholder="f" value="<?php echo $row['meja'] ?>" required>

                                                    <label for="meja">No meja</label>
                                                    <div class="invalid-feedback">
                                                        masukan no meja
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-floating mb-3">
                                                    <input name="pelanggan" type="text" class="form-control" id="pelanggan" placeholder="namapelanggan" value="<?php echo $row['pelanggan'] ?>" required>

                                                    <label for="pelanggan">Nama Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Pelanggan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo $row['catatan'] ?>" name="catatan" type="text" class="form-control" id="catatan" placeholder="catatan">
                                                    <label for="catatan">catatan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-primary" name="inputorder" value="1234">edit order</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end modal edit -->
                    <!-- modal delete -->
                    <div class="modal fade" id="modaldelete<?php echo $row['id_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/delete_order.php" method="POST" class="needs-validation" novalidate>
                                        <input type="hidden" value="<?php echo ($row['id_order']); ?>" name="id_order">
                                        <div class="colo-l-6">
                                            batalkan orderan <b><?php echo $row['pelanggan'] ?></b>??
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
                                <th scope="col">Kode order</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">meja</th>
                                <th scope="col">total harga</th>
                                <th scope="col">pelayan</th>
                                <th scope="col">status</th>
                                <th scope="col">waktu order</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($result as $row) {


                            ?>
                                <tr class="text-nowrap">
                                    <th scope="row"><?php echo $no++;  ?></th>
                                    <td><?php echo $row['id_order'] ?></td>
                                    <td><?php echo $row['pelanggan'] ?></td>
                                    <td><?php echo $row['meja'] ?></td>
                                    <td><?php echo $row['harganya'] ?></td>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo !empty($row['id_bayar']) ? "sudah bayar" : "belum bayar"; ?></td>
                                    <td><?php echo $row['waktu_order'] ?></td>
                                    <td class="">
                                        <div class="d-flex" style="gap: 10px;">
                                            <a class="btn btn-info  btn-sm" href="./?x=orderitem&order=<?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i class="bi bi-eye"></i></a>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-warning"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id_order']; ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-danger"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id_order']; ?>"><i class="bi bi-trash"></i></button>
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