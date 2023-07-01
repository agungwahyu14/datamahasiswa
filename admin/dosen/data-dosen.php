<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-5">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tabel Dosen</h1>
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
    <div class="card shadow mb-4">

      <div class="card-header py-3">
        <a href="?p=tmb_guru" style="text-decoration:none;" class="btn btn-primary">Tambah Data Dosen [+]</a>
      </div>
      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Id Dosen</th>
                <th>Nama</th>
                <th>Id Prodi</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <?php
            $data = $admin->getAllDosen();

            if (empty($data)) : ?>
              <tr>
                <td colspan="7" align="center">Data Dosen tidak ditemukan</td>
              </tr>
            <?php endif; ?>

            <?php $i = 1; ?>
            <?php foreach ($data as $dsn) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $dsn['id_dosen']; ?></td>
                <td><?= $dsn['nama']; ?></td>
                <td><?= $dsn['id_prodi']; ?></td>
                <td><?= $dsn['alamat']; ?></td>
                <td><?= $dsn['jenis_kelamin']; ?></td>
                <td>
                  <a href="?p=hps-petugas&id_dosen=<?= $dsn['id_dosen']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" class="btn btn-danger">hapus</a> |
                  <a href="?p=ubh-petugas&id_dosen=<?= $dsn['id_dosen']; ?>" class="btn btn-warning text-dark">ubah</a>
                </td>
              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>