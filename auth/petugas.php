<div class="content-wrapper" style="min-height: 641px;">
   

    <!-- konten utama -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
<div class="card-body">

    <h1>Data Petugas</h1>
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#petugas">
            <i class="fas fa-user-plus fa-sm text-white-80"></i>Tambah Petugas</button>
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-bordered" id="myTable">

                
            <thead>
          
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

$no = 1;
foreach ($fung->datapetugas() as $d) { ?>
                <tr>
                    <td> <?= $no++; ?> </td>
                    <td> <?= $d['NamaLengkap'] ?> </td>
                    <td> <?= $d['Username'] ?> </td>
                    <td> <?= $d['Role'] ?> </td>

                    <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#reset">Reset</button>

                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $d['UserID'] ?>"><i class="fa fa-edit fa-sm text-white"></i></button>
                        <a href="index.php?page=hapuspetugas&UserID=<?= $d['UserID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin menghapus data <?= $d['NamaLengkap'] ?>y')"><i class="fa fa-trash"></i> </a>
                    </td>
                </tr>

            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="petugas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="index.php?page=registerPetugas" method="POST" id="logForm">
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="UserID" hidden>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="NamaLengkap">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="Username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="Password">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="Email">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="Alamat" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Daftar</button>

                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- edit -->
<?php
foreach ($fung->datapetugas() as $k) { ?>
    <div class="modal fade" id="edit<?= $k['UserID'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit petugas </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <form action="index.php?page=updatepetugas" method="post">
                    <div class="modal-body">

                        <input type="text" name="UserID" value="<?= $k['UserID']; ?>" hidden>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="NamaLengkap" value="<?= $k['NamaLengkap']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="Username" value="<?= $k['Username']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="Password" value="<?= $k['Password']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="Email" value="<?= $k['Email']; ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="Alamat" class="form-control" cols="30" rows="5" value="<?= $k['Alamat']; ?>" required=""></textarea>
                        </div>


                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    </div>
<?php  }
?>

<!-- /.modal -->
<!-- modal reset -->
<?php
foreach ($fung->datapetugas() as $k) { ?>
    <div class="modal fade" id="reset">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="dashboard.php?page=resetpassword" method="POST" id="logForm">
                    <div class="card-body">
                        <input type="hidden" name="UserID" value="<?= $k['UserID']; ?>">
                        <div class="form-group">
                            <p>
                                Apa anda yakin mengatur ulang kata sandi?
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php  }
?>
<!-- /.modal -->
