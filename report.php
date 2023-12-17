<?php $no = 1; ?>

<?php
include 'proses/conect.php';

$query = mysqli_query(
    $conn,
    "SELECT * FROM tb_report"
);
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}


?>

<div class="col-lg-9  mt-2">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Karyawan</th>
                        <th scope="col">Keluhan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (empty($result)) {
                        echo 'Belum ada pengaduan';
                    } else {


                        foreach ($result as $row) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $row['nama']; ?></td>
                                <td><?php echo $row['Keluhan']; ?></td>

                            </tr>

                    <?php  }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>