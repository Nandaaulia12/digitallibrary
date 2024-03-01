<div class="content-wrapper" style="min-height: 641px;">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div>
    </section> -->

    <!-- konten utama -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
            <h1>Ulasan Buku</h1>
<hr>

<div class="table-responsive">
<table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Ratting</th>
                <th>Ulasan</th>
                <?php
                if ($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fung->viewUlasan() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['Ratting']; ?></td>
                    <td><?= $d['Ulasan']; ?></td>
                    <?php
                if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                    <td>
                        <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapusUlasan&UlasanID=<?= $d['UlasanID'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                </td>
                <?php } ?>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>


<div class="modal fade" id="tambahkategori">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postdatabuku" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul">
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="Penulis">
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="Penerbit">
              </div>
              <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="text" class="form-control" name="TahunTerbit">
              </div>
              <div class="form-group">
              <?php 
                        foreach($fung->viewKategori() as $d){ ?>
                            <div><input type="checkbox" name="kategori[<?= $d['KategoriID'] ?>]" value="<?= $d['KategoriID'] ?>"> <?= $d['NamaKategori'] ?></div>
                      <?php  }
                    ?>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <?php 
        foreach($fung->viewDataBuku() as $d) { ?>
            <div class="modal fade" id="edit<?= $d['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=updatedatabuku" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>">
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="Penulis" value="<?= $d['Penulis'] ?>">
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="Penerbit" value="<?= $d['Penerbit'] ?>">
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" class="form-control" name="TahunTerbit" value="<?= $d['TahunTerbit'] ?>">
              </div>
             
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
      <!-- /.modal -->
      <?php  }
    ?>
      

      <?php 
        foreach($fung->viewDataBuku() as $d) { ?>
            <div class="modal fade" id="pinjam<?= $d['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=ajukanPinjam" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="Penulis" value="<?= $d['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="Penerbit" value="<?= $d['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun Terbit</label>
                <input type="text" class="form-control" name="TahunTerbit" value="<?= $d['TahunTerbit'] ?>" disabled>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ajukan Pinjam Buku</button>
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


<?php 
        foreach($fung->viewDataBuku() as $d) { ?>
            <div class="modal fade" id="ulas<?= $d['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postUlasan" method="post">
            <div class="modal-body">
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="UserID" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="TanggalPeminjaman" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="Ulasan" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Ratting</label>
                <select name="Ratting" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
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