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
    while ($record = mysqli_fetch_array($query)) {
        $result[] = $record;
    }
    ?>
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
                    echo       '<button class=" btn bg-primary ps-5 pe-5 text-light" data-bs-toggle="modal" data-bs-target="#bayar">Beri sangsi pegawai</button>';
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
                            

                           
                        echo '</div>
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




                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>