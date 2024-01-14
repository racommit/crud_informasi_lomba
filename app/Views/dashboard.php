<?= $this->extend('default') ?>

<?= $this->section('konten') ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Dashboard | Sistem Informasi Lomba </title>
    <!-- Bootstrap CSS -->
    
    <!-- ... tag head lainnya ... -->
</head>

<!-- konten -->
<?php
$mahasiswaModel = new \App\Models\mahasiswaModel();
$lombaModel = new \App\Models\lombaModel();
$userModel = new \App\Models\userModel();

$session = session();
$username = $session->get('username');


$idUser = $userModel->findIdByUsername($username);
$groupId = $userModel->findGroupByUser($idUser['id']);
$Role = $groupId[0]->group_id;
// var_dump($idUser['id']);
$jumlahJuara = $mahasiswaModel->hitungJumlahSemuaJuara()->getRow()->nama_mahasiswa;
$daftarLomba = $mahasiswaModel->daftarLomba()->getRow()->nama_lomba;
$jumlahLomba = $lombaModel->hitungJumlahSemuaLomba()->getRow()->namalomba;
// var_dump($jumlahLomba);die;
?>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">


            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-science"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $jumlahJuara; ?></span></div>
                                    <div class="stat-heading">Juara</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-arc"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $daftarLomba; ?></span></div>
                                    <div class="stat-heading">Lomba</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?=
                                                                                $jumlahLomba ?></span></div>
                                    <div class="stat-heading">Entry Lomba</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!--  Traffic  -->

        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <strong class="card-title">Data Mahasiswa</strong>
                        </div>

                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>
                                        <th>Nama Lomba</th>
                                        <th>Kategori</th>
                                        <th>Juara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($table as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row['nama_mahasiswa'] ?></td>
                                            <td><?= $row['kelas'] ?></td>
                                            <td><?= $row['nama_lomba'] ?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['juara'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div> <!-- /.card -->
    </div> <!-- /.col-lg-8 -->
</div>


 <!-- /konten -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</div>



<?= $this->endSection() ?>