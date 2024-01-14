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
                        <?php if ($Role == '1') : ?>
                            <button type="button" class="btn btn-primary btn-circle btn-sm btn-add-user" title="tambah User" >
                                Tambah
                            </button>
                        <?php endif; ?>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Grup</th>
                                    <th>Email</th>
                                    <th style="width: 60px;">Aktif</th>
                                    <th style="width: 90px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $rw) {
                                    $row = "row" . $rw->id;
                                    echo $$row;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<form action="<?= base_url(); ?>/users/activate" method="post">
    <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Ya" untuk mengupdate User</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?= base_url(); ?>/users/setPassword" method="post">
    <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" class="id">
                    <div class="form-group ">
                        <div class="col-12">
                            <input type="password" name="password" class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-12">
                            <input type="password" name="pass_confirm" class="form-control form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?= base_url(); ?>/users/changeGroup" method="post">
    <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Grup</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span class="card-title">Grup</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <select name="group" class="form-control" data-toggle="select">
                                    <?php
                                    foreach ($groups as $key => $row) {
                                    ?>
                                        <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?= base_url(); ?>/users/save" class="user" method="post">
<?= csrf_field() ?>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                    name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                            </div>
                        </div>
 
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                            </div>
                        </div>
 
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" name="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                            </div>
 
                            <div class="col-sm-6">
                                <input type="password" name="pass_confirm" class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
    <?php if (isset($notification) && $notification['type'] && $notification['message']) : ?>
        // Tampilkan notifikasi toastr
        toastr.options = {
            "positionClass": "toast-top-right", // Atur posisi toast
            "closeButton": true // Tambahkan tombol close
        };
        toastr.<?= $notification['type'] ?>('<?= $notification['message'] ?>');
    <?php endif; ?>

    $(document).ready(function() {
        // get Delete Page
        $('.btn-active-users').on('click', function() {
            // get data from button edit
            console.log('button di klik!')
            const id = $(this).data('id');
            const active = $(this).data('active');

            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);
            // Call Modal Edit
            $('#activateModal').modal('show');
        });

        $('.btn-change-password').on('click', function() {
            // get data from button edit
            console.log('button di klik!')
            const id = $(this).data('id');
            const active = $(this).data('active');

            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);
            // Call Modal Edit
            $('#changeModal').modal('show');
        });
        $('.btn-add-user').on('click', function() {
            // get data from button edit
            console.log('button di klik!')
            // const id = $(this).data('id');
            // const active = $(this).data('active');

            // // Set data to Form Edit
            // $('.id').val(id);
            // $('.active').val(active);
            // Call Modal Edit
            $('#addModal').modal('show');
        });

        $('.btn-change-group').on('click', function() {
            const id = $(this).data('id');

            $('.id').val(id);
            $('#changeGroupModal').modal('show');
        });

    });
</script>
<?= $this->endSection() ?>