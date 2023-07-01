<?php
require '../config/Database.php';

class Admin extends Database
{

  // === SECTION SISWA ===
  public function getAllMahasiswa()
  {
    $query = "SELECT * FROM tb_mahasiswa";
    $mahasiswa = $this->query($query);

    return $mahasiswa;
  }

  public function getMahasiswaById($nim)
  {
    $query = "SELECT * FROM tb_mahasiswa WHERE nim = " . $nim;
    $mahasiswa = $this->query($query);

    if (empty($mahasiswa)) {
      return $mahasiswa;
    } else {
      return $mahasiswa[0];
    }
  }

  public function tambahDataMahaiswa($data)
  {
    $conn = $this->conn;

    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $id_prodi = htmlspecialchars($data['id_prodi']);
    $id_dosen = htmlspecialchars($data['id_dosen']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $alamat = htmlspecialchars($data['alamat']);


    mysqli_query($conn, "INSERT INTO tb_mahasiswa VALUES ('$nim','$nama','$id_prodi','$id_dosen','$jenis_kelamin','$alamat')");

    return mysqli_affected_rows($conn);
  }

  public function ubahDataMahasiswa($data)
  {
    $conn = $this->conn;

    $nim = $data["nim"];
    $nama = htmlspecialchars($data['nama']);
    $id_prodi = htmlspecialchars($data['id_prodi']);
    $id_dosen = htmlspecialchars($data['id_dosen']);
    $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
    $alamat = htmlspecialchars($data['alamat']);

    mysqli_query($conn, "UPDATE tb_mahasiswa SET
                          nim = '$nim',
                          nama = '$nama',
                          id_prodi = '$id_prodi',
                          id_dosen = '$id_dosen',
                          jenis_kelamin = '$jenis_kelamin',
                          alamat = '$alamat'
                          

                        WHERE nim = $nim
    ");

    return mysqli_affected_rows($conn);
  }

  public function hapusMahasiswa($nim)
  {
    $conn = $this->conn;
    mysqli_query($conn, "DELETE FROM tb_mahasiswa WHERE nim = $nim");

    return mysqli_affected_rows($conn);
  }
  // === END SECTION SISWA ==



  // === SECTION PETUGAS ===
  public function getAllPetugas()
  {
    $query = "SELECT * FROM tb_admin";
    $petugas = $this->query($query);

    return $petugas;
  }

  public function getPetugasById($id_petugas)
  {
    $query = "SELECT * FROM tb_admin WHERE id_petugas = " . $id_petugas;
    $petugas = $this->query($query);

    return $petugas[0];
  }

  public function tambahDataPetugas($data)
  {
    $conn = $this->conn;

    $id_petugas = htmlspecialchars($data['id_petugas']);
    $nama_petugas = htmlspecialchars($data['nama_petugas']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $level = htmlspecialchars($data['level']);

    $query = "SELECT * FROM petugas WHERE username = '$username'";
    $cek = $this->query($query);
    if ($cek) {
      echo
      "<script>
        alert('Username Petugas Sudah Terdaftar!');
        window.location.href='?p=data-petugas'
      </script>";
      exit;
    } else {

      mysqli_query($conn, "INSERT INTO petugas VALUES ('$id_petugas','$username','$password','$nama_petugas','$level')");

      return mysqli_affected_rows($conn);
    }
  }

  public function ubahDataPetugas($data)
  {
    $conn = $this->conn;

    $id_petugas = $data["id_petugas"];
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $nama_petugas = htmlspecialchars($data['nama_petugas']);
    $level = htmlspecialchars($data['level']);

    mysqli_query($conn, "UPDATE petugas SET
                          id_petugas = '$id_petugas',
                          username = '$username',
                          password = '$password',
                          nama_petugas = '$nama_petugas',
                          level = '$level'

                        WHERE id_petugas = $id_petugas
    ");

    return mysqli_affected_rows($conn);
  }

  public function hapusPetugas($id_petugas)
  {
    $conn = $this->conn;
    mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas = $id_petugas");

    return mysqli_affected_rows($conn);
  }
  // === END SECTION PETUGAS ==



  // === SECTION KELAS ===
  public function getAllDosen()
  {
    $query = "SELECT * FROM tb_dosen";
    $dosen = $this->query($query);

    return $dosen;
  }

  public function getDosenById($id_kelas)
  {
    $query = "CALL getKelasById($id_kelas)";
    $kelas = $this->query($query);

    return $kelas[0];
  }

  public function tambahDataDosen($data)
  {
    $conn = $this->conn;

    $id_kelas = htmlspecialchars($data['id_kelas']);
    $nama_kelas = htmlspecialchars($data['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($data['kompetensi_keahlian']);

    mysqli_query($conn, "INSERT INTO kelas VALUES ('$id_kelas','$nama_kelas','$kompetensi_keahlian')");

    return mysqli_affected_rows($conn);
  }

  public function ubahDataDosen($data)
  {
    $conn = $this->conn;

    $id_kelas = $data["id_kelas"];
    $nama_kelas = htmlspecialchars($data['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($data['kompetensi_keahlian']);

    mysqli_query($conn, "UPDATE kelas SET
                          id_kelas = '$id_kelas',
                          nama_kelas = '$nama_kelas',
                          kompetensi_keahlian = '$kompetensi_keahlian'

                        WHERE id_kelas = $id_kelas
    ");

    return mysqli_affected_rows($conn);
  }

  public function hapusDosen($id_kelas)
  {
    $conn = $this->conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = $id_kelas");

    return mysqli_affected_rows($conn);
  }
  // === END SECTION KELAS ==



  // === SECTION SPP ===
  public function getAllProdi()
  {
    $query = "SELECT * FROM tb_prodi";
    $prodi = $this->query($query);

    return $prodi;
  }

  public function getProdiById($id_prodi)
  {
    $query = "SELECT * FROM tb_prodi WHERE id_prodi = " . $id_prodi;
    $prodi = $this->query($query);

    return $prodi[0];
  }

  public function tambahDataProdi($data)
  {
    $conn = $this->conn;

    $id_spp = htmlspecialchars($data['id_spp']);
    $tahun = htmlspecialchars($data['tahun']);
    $nominal = htmlspecialchars($data['nominal']);

    mysqli_query($conn, "INSERT INTO spp VALUES ('$id_spp','$tahun','$nominal')");

    return mysqli_affected_rows($conn);
  }

  public function ubahDataProdi($data)
  {
    $conn = $this->conn;

    $id_spp = $data["id_spp"];
    $tahun = htmlspecialchars($data['tahun']);
    $nominal = htmlspecialchars($data['nominal']);

    mysqli_query($conn, "UPDATE spp SET
                          id_spp = '$id_spp',
                          tahun = '$tahun',
                          nominal = '$nominal'

                        WHERE id_spp = $id_spp
    ");

    return mysqli_affected_rows($conn);
  }

  public function hapusProdi($id_spp)
  {
    $conn = $this->conn;
    mysqli_query($conn, "DELETE FROM spp WHERE id_spp = $id_spp");

    return mysqli_affected_rows($conn);
  }
  // === END SECTION SPP ===



}
