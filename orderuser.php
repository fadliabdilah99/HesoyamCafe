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
                <div class="col  d-flex justify-content-center">
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
        </div>
    </div>
</div>