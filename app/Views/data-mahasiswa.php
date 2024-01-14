<?= $this->extend('default') ?>

<?= $this->section('konten') ?>

<head>
    <title> Data Lomba | Sistem Informasi Lomba</title>
</head>
<?php
$userModel = new \App\Models\userModel();

$session = session();
$username = $session->get('username');


$idUser = $userModel->findIdByUsername($username);
$groupId = $userModel->findGroupByUser($idUser['id']);
$Role = $groupId[0]->group_id;
?>
<div class="breadcrumbs">
</div>

<!-- Tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Form Data Mahasiswa </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('tambah') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="juara">Juara</label>
                        <input type="text" class="form-control" id="juara" name="juara" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Tambah -->

<!-- Edit -->
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaledit">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('edit') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id2" name="id" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_mahasiswa">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="nama_mahasiswa2" name="nama_mahasiswa" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas2" name="kelas" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" class="form-control" id="nama_lomba2" name="nama_lomba" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" id="kategori2" name="kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="juara">Juara</label>
                        <input type="text" class="form-control" id="juara2" name="juara" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Ubah </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Edit -->


<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <strong class="card-title">Data Mahasiswa</strong>
                        <?php if($Role == '1') :?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Tambah
                        </button>
                        <?php endif;?>
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
                                    <?php if($Role == '1') :?>
                                    <th>Aksi</th>
                                    <?php endif;?>
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
                                        <?php if($Role == '1') :?>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaledit" onclick="kirimdata(<?= $row['id'] ?>,'<?= $row['nama_mahasiswa'] ?>','<?= $row['kelas'] ?>','<?= $row['nama_lomba'] ?>','<?= $row['kategori'] ?>','<?= $row['juara'] ?>')">
                                                edit
                                            </button>
                                            <form action="/delete" method="post">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                       
                                        <?php endif?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function kirimdata(id, nama, kelas, lomba, kategori, juara) {
        document.getElementById('id2').value = id;
        document.getElementById('nama_mahasiswa2').value = nama;
        document.getElementById('kelas2').value = kelas;
        document.getElementById('nama_lomba2').value = lomba;
        document.getElementById('kategori2').value = kategori;
        document.getElementById('juara2').value = juara;

    }
</script>
<?= $this->endSection() ?>