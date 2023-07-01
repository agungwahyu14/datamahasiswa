<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-5">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tabel Program Studi</h1>
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
        <a href="?p=tmb_guru" style="text-decoration:none;" class="btn btn-primary">Tambah Data Program Studi [+]</a>
      </div>
      <div class="card-body">

        <div class="table-responsive">

          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Id Prodi</th>
                <th>Program Studi</th>
                <th>Kelas</th>
                <th width="15%">Aksi</th>
              </tr>
            </thead>
            <?php
            $data = $admin->getAllProdi();

            if (empty($data)) : ?>
              <tr>
                <td colspan="7" align="center">Data Program Studi tidak ditemukan</td>
              </tr>
            <?php endif; ?>

            <?php $i = 1; ?>
            <?php foreach ($data as $prd) : ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $prd['id_prodi']; ?></td>
                <td><?= $prd['prodi']; ?></td>
                <td><?= $prd['kelas']; ?></td>
                <td>
                  <a href="?p=hps-program-studi&id_prodi=<?= $prd['id_prodi']; ?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini?');" class="btn btn-danger">hapus</a> |
                  <a href="?p=ubh-program-studi&id_prodi=<?= $prd['id_prodi']; ?>" class="btn btn-warning text-dark">ubah</a>
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