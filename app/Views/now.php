<?= $this->extend('default') ?>

<?= $this->section('konten') ?>

<head>
    <title> Now | Sistem Informasi Lomba</title>
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
                <h5 class="modal-title" id="exampleModalLabel"> Form Lomba Yang Sedang Berjalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('tambahLomba') ?>" method="post">

                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text" class="form-control" id="event" name="event" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
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
                <h5 class="modal-title" id="exampleModalLabel"> Form Lomba Yang Sedang Berjalan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('editLomba') ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="text" class="form-control" id="event2" name="event2" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_lomba">Nama Lomba</label>
                        <input type="text" class="form-control" id="nama_lomba2" name="nama_lomba2" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal2" name="tanggal2" required>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan2" name="keterangan2" required>
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


<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <strong class="card-title">Lomba sedang berjalan</strong>
                        <?php if($Role == '1') :?>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah
                            </button>
                            <?php endif?>
                        </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Event</th>
                                    <th>Nama Lomba</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <?php if($Role == '1') :?>
                                        <th>Aksi</th>
                                        <?php endif?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($table1 as $row) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['event'] ?></td>
                                        <td><?= $row['namalomba'] ?></td>
                                        <td><?= date('d F Y', strtotime($row['tanggal'])); ?></td>
                                        <td><?= $row['keterangan'] ?></td>
                                        <?php if($Role == '1') :?>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modaledit" onclick="kirimdata(<?= $row['id'] ?>,'<?= $row['event'] ?>','<?= $row['namalomba'] ?>','<?= $row['tanggal'] ?>','<?= $row['keterangan'] ?>')">
                                                    edit
                                                </button>
                                                <form action="/deleteLomba" method="post">
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
        </div><!-- .animated -->
    </div><!-- .content -->


</div>
</div><!-- .animated -->
</div><!-- .content -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include toastr library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
   
   
        <?php if (isset($notification) && $notification['type'] && $notification['message']) : ?>
            // Tampilkan notifikasi toastr
            toastr.options = {
                "positionClass": "toast-top-right", // Atur posisi toast
                "closeButton": true // Tambahkan tombol close
            };
            toastr.<?= $notification['type'] ?>('<?= $notification['message'] ?>');
        <?php endif; ?>

        function kirimdata(id, event, nama_lomba, tanggal, keterangan) {
        console.log(id, event, nama_lomba, tanggal, keterangan)
        document.getElementById('id').value = id;
        document.getElementById('event2').value = event;
        document.getElementById('nama_lomba2').value = nama_lomba;
        document.getElementById('tanggal2').value = tanggal;
        document.getElementById('keterangan2').value = keterangan;
        // document.getElementById('juara2').value = juara;

    }
  
    

   
</script>
<?= $this->endSection() ?>