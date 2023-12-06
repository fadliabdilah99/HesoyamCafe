<?php
include 'proses/conect.php';

$query = mysqli_query($conn, "SELECT * FROM tb_list_order
        LEFT JOIN tb_order on tb_order.id_order = tb_list_order.order
        LEFT JOIN tb_menu on tb_menu.id = tb_list_order.menu
        LEFT JOIN tb_bayar on tb_bayar.id_bayar = tb_order.id_order
        ORDER by waktu_order asc
      ");


while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT  id,nama_menu FROM tb_menu");

?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">
            Dapur

        </div>
        <div class="card-body">

            <div class="row">
                <div class="col  d-flex justify-content-end">
                </div>
            </div>

            <?php
            if (empty($result)) {
                echo "data menu tidak ada";
            } else {
                foreach ($result as $row) {


            ?>


                    <!-- modal terima -->
                    <div class="modal fade" id="terima<?php echo $row['id_list_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">terima pesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/proses_terimaorder.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="menu" id="" required>
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
                                                    <input disabled value="<?php echo $row['jumlah']; ?>" name="jumlah" type="number" class="form-control" id="floatingInput" placeholder="Nama Menu" required>

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
                                            <button type="submit" class="btn btn-primary" name="terima" value="1234">terima</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end modal terima -->
                    <!-- modal siap saji -->
                    <div class="modal fade" id="siap<?php echo $row['id_list_order']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">siap saji</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="proses/proses_siapasaji.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $row['id_list_order']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-floating mb-3">
                                                    <select disabled class="form-select" name="menu" id="" required>
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
                                                    <input disabled value="<?php echo $row['jumlah']; ?>" name="jumlah" type="number" class="form-control" id="floatingInput" placeholder="Nama Menu" required>

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
                                            <button type="submit" class="btn btn-primary" name="siapsaji" value="1234">siap saji</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end modal siap saji -->


                <?php
                }
                $total = 0;

                ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode order</th>

                                <th scope="col">Waktu Order</th>
                                <th scope="col">Menu</th>
                                <th scope="col">QTY</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $no = 1;
                            foreach ($result as $row) {

                            ?>
                                <tr class="text-nowrap">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row['order'] ?></td>
                                    <td><?php echo $row['waktu_order'] ?></td>
                                    <td><?php echo $row['nama_menu'] ?></td>
                                    <td><?php echo $row['jumlah'] ?></td>
                                    <td><?php echo $row['keterangan_list']; ?></td>
                                    <td><?php if ($row['status'] == 1) {
                                            echo 'orderan diteriman';
                                        } elseif ($row['status'] == 2) {
                                            echo 'siap disajikan';
                                        } else {
                                            echo 'belum di terima';
                                        } ?></td>
                                    <td class="">
                                        <div class="d-flex" style="gap: 10px;">
                                            <button class="<?php echo (!empty($row['status'])) ? "btn btn-secondary disabled" : "btn btn-warning"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#terima<?php echo $row['id_list_order']; ?>">terima</button>
                                            <button class="<?php echo (empty($row['status']) || $row['status'] != 1) ? "btn btn-secondary disabled" : "btn btn-danger"; ?>   btn-sm" data-bs-toggle="modal" data-bs-target="#siap<?php echo $row['id_list_order']; ?>">siap saji</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php

                            } ?>


                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <div class="">

            </div>
        </div>
    </div>
</div>