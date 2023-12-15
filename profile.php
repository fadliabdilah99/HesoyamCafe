<?php
include 'proses/conect.php';




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card .level,
        .pelanggaranbtn .btn {
            background-color: rgb(173, 241, 173);
            padding: 0.2rem 1rem 0.2rem 1rem;
            border-radius: 20px;

        }

        .card .levelb,
        .pelanggaranbtn .btn {
            color: green;
        }

        .sosialmedia {
            gap: 20;
        }
    </style>
</head>

<body>

    <?php
    include 'proses/conect.php';
    $query = mysqli_query(
        $conn,
        "SELECT * FROM tb_bayar"
    );
    $select_user = mysqli_query(
        $conn,
        "SELECT * FROM tb_user"
    );
    while ($record = mysqli_fetch_array($query)) {
        $result[] = $record;
    }
    ?>




    <!-- tambah poin kesalahan -->
    <div class="modal fade" id="skor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Beri Poin Sangsi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="proses/proses_sangsi_user.php" method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="poin" id="">
                                        <option value="" selected>tingkat pelanggaran</option>
                                        <option value="2">Ringan</option>
                                        <option value="5">sedang</option>
                                        <option value="10">berat</option>
                                        <option value="20">sangat berat</option>

                                    </select>
                                    <label for="menu">Karyawan yang melakukan pelanggaran</label>
                                    <div class="invalid-feedback">
                                        pilih menu
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" name="karyawan" id="">
                                        <option value="" selected>karyawan</option>
                                        <?php
                                        foreach ($select_user as $value) {
                                            echo "<option value=$value[id]>$value[nama]</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="menu">Karyawan yang melakukan pelanggaran</label>
                                    <div class="invalid-feedback">
                                        pilih menu
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
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="sumbit" class="btn btn-primary" name="pelanggaran" value="1234">Understood</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- end tambah poin kesalahan -->





    <div class="col-lg-9  mt-2">
        <div class="card ">
            <div class="p-3">
                <div class=" d-flex justify-content-center">
                    <img src="asset/Designer _Outline 1.png" class="bg-dark rounded-circle" alt="...">
                </div>
                <div class="d-flex justify-content-center">
                    <h1><?php echo $hasil['nama'] ?></h1>
                </div>
                <div class="d-flex justify-content-center levelb">
                    <p class="level"><?php $level = $hasil['level'];

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
                                        ?></p>
                </div>
                <?php

                if ($hasil['level'] == 1) {

                    echo '<div class="  d-flex justify-content-center pelanggaranbtn">';
                    echo       '<button class=" btn bg-primary ps-5 pe-5 text-light" data-bs-toggle="modal" data-bs-target="#skor">Beri sangsi pegawai</button>';
                    echo  '</div>';
                }


                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="col-lg-4 p-4">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-title">Email User</h6>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $hasil['username'] ?> </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-4">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-title">No hp</h6>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $hasil['notelepon'] ?> </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 p-4">
                            <div class="card " style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-title">Alamat</h6>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $hasil['alamat'] ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 p-4">
                        <div class="card  mb-3">
                            <div class="card-header">info lengkap</div>
                            <?php

                            if ($hasil['level'] == 1) {


                                echo '<div class="card-body">
                                    <h5 class="card-title">Total Pendapatan</h5>';


                                $total = 0;
                                foreach ($result as $row) {
                                    $total += $row['total'];
                                }
                                echo '<p class="card-text">Rp ' . number_format($total, 0, ',', '.') . ' </p>
                                </div>';



                                echo '
                        <div class="card  mb-3">
                            <div class="card-header">info Restaurant</div>
                            <div class="card-body">
                                <h6 class="card-title">Alamat</h6>
                                <h6 class="card-subtitle mb-2 text-body-secondary">Jl.ali-bin-abithalib, gedung lantai 1, Padalarang, Bandung barat, 5434</h6>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Jam Oprasional</h6>
                                <h6 class="card-subtitle mb-2 text-body-secondary">08:00-22:00 </h6>
                            </div>
                            <div class="card-body ">
                                <h6 class="card-title text-center mb-4">Sosial Media</h6>
                                <div class="d-flex justify-content-around">
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-whatsapp"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-tiktok"></i></a>

                                </div>
                            </div>
                        </div>';
                            }

                            ?>


                            <?php
                            if ($hasil['level'] != 1) {
                                echo '<div class="card-body">';
                                echo '<h6 class="card-title">Kredit Skor</h6>';

                                $iduser = $hasil['id'];
                                $query2 = mysqli_query($conn, "SELECT skor_pelanggaran, keterangan_pelanggaran FROM tb_pelanggaran where id_pelanggaran = $iduser ");
                                while ($record2 = mysqli_fetch_array($query2)) {
                                    $result2[] = $record2;
                                }
                                $skor = 0;

                                if (empty($result2)) {
                                    echo "kamu tidak memiliki skor pelanggaran";
                                } else {
                                    foreach ($result2 as $row) {
                                        $skor += $row['skor_pelanggaran'];
                                    }
                                }

                                echo '<h6 class="card-subtitle mb-2 ';
                                if ($skor > 0 && $skor <= 10) {
                                    echo 'text-success';
                                } elseif ($skor > 10 && $skor <= 20) {
                                    echo 'text-warning';
                                } else {
                                    echo 'text-danger';
                                }
                                echo '">' . $skor . '</h6>';
                                echo '</div>';
                            }
                            ?>

                        </div>
                        <div class="card md-3">
                            <div class="card-body ">
                                <h6 class="card-title text-center mb-4">Pelanggaran yang dilakukan</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">skor</th>
                                            <th scope="col">pelanggaran yang di lakukan</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;

                                    if (empty($result2)) {
                                        echo "kamu tidak memiliki skor pelanggaran";
                                    } else {
                                        foreach ($result2 as $row) {
                                            $skor += $row['skor_pelanggaran'];

                                    ?>
                                            <tbody>
                                                <tr>
                                                    <th scope="row"><?php echo $no++ ?></th>
                                                    <td><?php echo $row['keterangan_pelanggaran']; ?></td>
                                                    <td><?php echo $row['skor_pelanggaran']; ?></td>
                                                </tr>

                                            </tbody>
                                    <?php     }
                                    } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>