<?php
if (isset($_POST['tambah'])) {
  if ($admin->tambahDataMahaiswa($_POST) > 0) {
    echo
    "<script>
      alert('Data BERHASIL Ditambah!');
      window.location.href='?p=data-mahasiswa'
    </script>";
  } else {
    echo
    "<script>
      alert('Data GAGAL Ditambah!');
      window.location.href='?p=data-mahasiswa'
    </script>";
  }
}
$mahasiswa = $admin->getAllMahasiswa();
$prodi = $admin->getAllProdi();
$dosen = $admin->getAllDosen();

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-5">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Form Tambah Mahasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card mb-4">
            
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nim">NIM :</label>
                            <input class="form-control" type="text" name="nim" id="nim" required autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="nama"> Nama :</label>
                            <input class="form-control" type="nama" name="nama" id="nama" required autocomplete="off">

                        </div>

                        <div class="form-group">
                            <label for="id_prodi">ID Prodi :</label>
                            <select class="form-control" id="id_prodi" name="id_prodi">
                                <option value="">== Pilih Prodi ==</option>
                                <?php foreach ($prodi as $prd) : ?>
                                    <option value="<?= $prd['id_prodi'] ?>"><?= $prd['prodi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_dosen">ID Dosen :</label>
                            <select class="form-control" id="id_dosen" name="id_dosen">
                                <option value="">== Pilih Dosen ==</option>
                                <?php foreach ($dosen as $dsn) : ?>
                                    <option value="<?= $dsn['id_dosen'] ?>"><?= $dsn['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="">== Pilih ==</option>
                                    <option value="laki-laki">Laki - Laki</option>
                                    <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat : </label>
                            <input class="form-control" type="text" name="alamat" id="alamat" required>
                        </div>

                        

    
                        <hr>

                        <button class="btn btn-primary" type="submit" name="tambah">Tambah Data!</button>
                    </form>
                </div>
            
        </div>
    </section>
</div>