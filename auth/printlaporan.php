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
            <h1>Data Peminjaman</h1>
<hr>
    
<div class="table-responsive">
<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fung->viewPeminjam() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['TanggalPeminjaman']; ?></td>
                    <td>
                        <?php 
                            $sekarang = strtotime(date('Y-m-d'));
                            $kembali = strtotime($d['TanggalPengembalian']);
                            if($sekarang > $kembali) {
                                echo "<span class='badge badge-primary'>Terlambat</span>";
                            } else {
                                echo $d['TanggalPengembalian'];
                            }
                        ?>
                    </td>
                   <td>
                   <?php 
                            if($d['StatusPeminjaman'] == 'wait') { 
                                echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
                            } elseif($d['StatusPeminjaman'] == 'pinjam') {
                                echo "<span class='badge badge-success'>Sedang dipinjam</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Selesai</span>";
                            }
                        ?>
                   </td>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>



    <?php 
        foreach($fung->viewPeminjam() as $d) { ?>
            <div class="modal fade" id="konfirmasi<?= $d['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Pinjaman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasiPinjaman" method="post">
            <div class="modal-body">
            <input type="text" name="PeminjamanID" value="<?= $d['PeminjamanID'];?>" hidden>
            <input type="text" name="BukuID" value="<?= $d['BukuID'];?>" hidden>
            <input type="text" name="UserID" value="<?= $d['UserID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Nama Peminjam</label>
                <input type="text" class="form-control" name="NamaLengkap" value="<?= $d['NamaLengkap'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="TanggalPeminjaman" value="<?= $d['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $d['TanggalPengembalian'] ?>">
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
        foreach($fung->viewPeminjam() as $d) { ?>
            <div class="modal fade" id="pengembalian<?= $d['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pengembalian Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasiPengembalian" method="post">
            <div class="modal-body">
            <input type="text" name="PeminjamanID" value="<?= $d['PeminjamanID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="Judul" value="<?= $d['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Nama Peminjam</label>
                <input type="text" class="form-control" name="NamaLengkap" value="<?= $d['NamaLengkap'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="TanggalPeminjaman" value="<?= $d['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="TanggalPengembalian" value="<?= $d['TanggalPengembalian'] ?>" disabled>
              </div>
             <p>Klik Konfirmasi Buku jika sudah dikembalikan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi Pengembalian</button>
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
                <label for="">Tahun</label>
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
            <form action="dashboard.php?page=postulasan" method="post">
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
                <textarea name="ulasan" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Rating</label>
                <select name="rating" class="form-control">
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

<script>
    window.print();
</script>
