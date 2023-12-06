<?php
include 'proses/conect.php';

$query = mysqli_query($conn, "SELECT *, SUM(harga*jumlah) AS harganya FROM tb_list_order
        LEFT JOIN tb_order on tb_order.id_order = tb_list_order.order
        LEFT JOIN tb_menu on tb_menu.id = tb_list_order.menu
        LEFT JOIN tb_bayar on tb_bayar.id_bayar = tb_order.id_order
        GROUP BY id_list_order
        having tb_list_order.order = $_GET[order]");



$kode = $_GET['order'];
$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];


while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT  id,nama_menu FROM tb_menu");

?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Order item

        </div>
        <div class="card-body">
            <a href="order" class="btn btn-dark mb-3">kembali</a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled name="foto" type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadFoto">kode_order</label>

                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled name="foto" type="text" class="form-control" id="meja" value="<?php echo $meja; ?>">
                        <label for="uploadFoto">meja</label>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled name="foto" type="text" class="form-control" id="meja" value="<?php echo $pelanggan; ?>">
                        <label for="uploadFoto">Nama</label>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col  d-flex justify-content-end">
                </div>
            </div>
            <!-- modal tambah item baru -->
            <div class="modal fade" id="tambahitem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="proses/input_orderitem.php" method="POST" class="needs-validation" novalidate>
                                <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="menu" id="">
                                                <option value="" selected>Pilihh Menu</option>
                                                <?php
                                                foreach ($select_menu as $value) {
                                                    echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                }
                                                ?>
                                            </select>
                                            <label for="menu">menu makanan minuman</label>
                                            <div class="invalid-feedback">
                                                pilih menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input name="jumlah" type="number" class="form-control" id="floatingInput" placeholder="Nama Menu" required>

                                            <label for="floatingInput">jumlah</label>
                                            <div class="invalid-feedback">
                                                masukan jumlah pesanan
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-primary" name="inputlistorder" value="1234">Understood</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            <!-- end tambah item baru -->
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
                    <div class="modal fade" id="modaledit<?php echo $row['id_list_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/proses_edit_listmenu.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                        <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                        <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select class="form-select" name="menu" id="" required>
                                                        <option value="" selected><?php echo $row['nama_menu']; ?></option>
                                                        <?php
                                                        foreach ($select_menu as $value) {
                                                            echo "<option value=$value[id]>$value[nama_menu]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="menu">menu makanan minuman</label>
                                                    <div class="invalid-feedback">
                                                        pilih menu
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo $row['jumlah']; ?>" name="jumlah" type="number" class="form-control" id="floatingInput" placeholder="Nama Menu" required>

                                                    <label for="floatingInput">jumlah</label>
                                                    <div class="invalid-feedback">
                                                        masukan jumlah pesanan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-floating mb-3">
                                                    <input value="<?php echo $row['keterangan_list']; ?>" name="keterangan" type="text" class="form-control" id="floatingInput" placeholder="Keterangan">
                                                    <label for="floatingPassword">Keterangan pelanggan</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="sumbit" class="btn btn-primary" name="editlistorder" value="1234">Understood</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end modal edit -->
                    <!-- modal delete -->
                    <div class="modal fade" id="modaldelete<?php echo $row['id_list_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">delete</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/delete_itemorder.php" method="POST" class="needs-validation" novalidate>
                                        <input type="hidden" value="<?php echo ($row['id_list_order']); ?>" name="id_list">
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

                <?php
                }
                $total = 0;

                ?>
                <!-- modal bayar -->
                <div class="modal fade" id="bayar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Bayar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th scope="col">menu</th>
                                                <th scope="col">harga</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">total</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($result as $row) {


                                            ?>
                                                <tr class="text-nowrap">
                                                    <td><?php echo $row['nama_menu'] ?></td>
                                                    <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                                    <td><?php echo $row['jumlah'] ?></td>
                                                    <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>

                                                </tr>
                                            <?php
                                                $total += $row['harganya'];
                                            } ?>
                                            <tr>
                                                <td colspan="3" class="fw-bold">
                                                    total
                                                </td>
                                                <td>
                                                    Rp <?php echo number_format($total, 0, ',', '.') ?>
                                                </td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <span class="text-danger fs-15 fw-semibold"> Apakan Anda Yakin Inin Melakukan Transaksi??</span>
                                <form action="proses/proses_bayar.php" method="POST" class="needs-validation" novalidate>
                                    <input type="hidden" name="kode_order" value="<?php echo $kode ?>">
                                    <input type="hidden" name="meja" value="<?php echo $meja ?>">
                                    <input type="hidden" name="pelanggan" value="<?php echo $pelanggan ?>">
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-floating mb-3">
                                                <input name="uang" type="number" class="form-control" id="floatingInput" placeholder="uang" required>

                                                <label for="floatingInput">Masukan Nominal uang</label>
                                                <div class="invalid-feedback">
                                                    Masukan nominal uang
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class=" btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="sumbit" class="btn btn-primary" name="bayar" value="1234">Bayar</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- end bayar -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>

                                <th scope="col">menu</th>
                                <th scope="col">harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">status</th>
                                <th scope="col">total</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($result as $row) {


                            ?>
                                <tr class="text-nowrap">
                                    <td><?php echo $row['nama_menu'] ?></td>
                                    <td><?php echo number_format($row['harga'], 0, ',', '.') ?></td>
                                    <td><?php echo $row['jumlah'] ?></td>
                                    <td><?php if ($row['status'] == 1) {
                                            echo 'orderan diteriman';
                                        } elseif ($row['status'] == 2) {
                                            echo 'siap disajikan';
                                        } else {
                                            echo 'belum di terima';
                                        } ?></td>
                                    <td><?php echo number_format($row['harganya'], 0, ',', '.') ?></td>
                                    <td class="">
                                        <div class="d-flex" style="gap: 10px;">
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-warning"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#modaledit<?php echo $row['id_list_order']; ?>"><i class="bi bi-pencil-square"></i></button>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-danger"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#modaldelete<?php echo $row['id_list_order']; ?>"><i class="bi bi-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            } ?>
                            <tr>
                                <td colspan="3" class="fw-bold">
                                    total
                                </td>
                                <td>
                                    Rp <?php echo number_format($total, 0, ',', '.') ?>
                                </td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <div class="">
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-success"; ?> " data-bs-toggle="modal" data-bs-target="#tambahitem"><i class="bi bi-eye"></i>item</button>
                <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary disabled" : "btn btn-primary"; ?> " data-bs-toggle="modal" data-bs-target="#bayar"><i class="bi bi-eye"></i>bayar</button>

            </div>
        </div>
    </div>
</div>