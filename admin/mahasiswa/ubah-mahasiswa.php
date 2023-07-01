<?php
$nim = $_GET["nim"];

if (isset($_POST['ubah'])) {
  if ($admin->ubahDataMahasiswa($_POST) > 0) {
    echo
    "<script>
      alert('Data BERHASIL Diubah!');
      window.location.href='?p=data-mahasiswa'
    </script>";
  } else {
    echo
    "<script>
      alert('Data GAGAL Diubah!');
      window.location.href='?p=data-mahasiswa'
    </script>";
  }
}

$mhs = $admin->getMahasiswaById($nim);







?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-5">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Ubah Mahasiswa</h1>
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
            <input class="form-control" type="text" name="nim" id="nim" required autocomplete="off" value="<?= $mhs['nim'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="nama"> Nama :</label>
            <input class="form-control" type="nama" name="nama" id="nama" required autocomplete="off" value="<?= $mhs['nama'] ?>">

          </div>

          <div class="form-group">
            <label for="id_prodi">Id Prodi : </label>
            <select class="form-control" name="id_prodi" required>
              
                <option class="option" value=" <?= $mhs['id_prodi'] ?>"><?= $mhs['id_prodi'] ?></option>

            </select>
          </div>


          <div class="form-group">
            <label for="id_dosen">Id Dosen : </label>
            <select class="form-control" name="id_dosen" required>
              
                <option class="option" value=" <?= $mhs['id_dosen'] ?>"><?= $mhs['id_dosen'] ?></option>

            </select>
          </div>

          <div class="form-group">
            <label for="alamat">Jenis Kelamin : </label>
            <input class="form-control" type="text" name="jenis_kelamin" id="jenis_kelamin" required readonly value="<?= $mhs['jenis_kelamin'] ?>">
          </div>

          <div class="form-group">
            <label for="alamat">Alamat : </label>
            <input class="form-control" type="text" name="alamat" id="alamat" required value="<?= $mhs['alamat'] ?>">
          </div>




          <hr>

          <button class="btn btn-warning text-dark" type="submit" name="ubah">Ubah Data!</button>
        </form>
      </div>

    </div>
  </section>
</div>