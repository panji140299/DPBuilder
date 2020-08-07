<?php

abstract class Pinjam {
    abstract function pinjam_buku();
}

abstract class Antrian_Pesanan {
    abstract function __construct(Pinjam $pesan);
    abstract function buat_pinjaman();
    abstract function pinjam_buku();
}

class Prosedur_Kerja {
    private $peminjaman = NULL;
    private $buku = NULL;
    private $judul = NULL;
    private $penulis = NULL;
    function tampil_pinjaman() {
      return $this->peminjaman;
    }
    function tampil_buku($in_buku) {
      $this->buku = $in_buku;
    }
    function tampil_judul($in_judul) {
      $this->judul = $in_judul;
    }
    function tampil_penulis($in_penulis) {
      $this->penulis .= $in_penulis;
    }
    function atur_tampilan() {
       $this->peminjaman .= '<h2>Kode Buku : '.$this->buku.'</h2>';
       $this->peminjaman .= '<h3>Judul Buku : '.$this->judul.'</h3>';
       $this->peminjaman .= '<h4>Penulis : '.$this->penulis.'</h4>';
    }
}

class Buat_Pinjaman extends Pinjam {
    private $peminjaman = NULL;
    function __construct() {
      $this->peminjaman = new Prosedur_Kerja();
    }
    function tampil_buku($in_buku) {
      $this->peminjaman->tampil_buku($in_buku);
    }
    function tampil_judul($in_judul) {
      $this->peminjaman->tampil_judul($in_judul);
    }
    function tampil_penulis($in_penulis) {
      $this->peminjaman->tampil_penulis($in_penulis);
    }
    function atur_tampilan() {
      $this->peminjaman->atur_tampilan();
    }
    function pinjam_buku() {
      return $this->peminjaman;
    }
}

class Prosedur_pinjaman extends Antrian_Pesanan {
    private $pesan = NULL;
    public function __construct(Pinjam $pesan) {
	     $this->pesan = $pesan;
    }
    public function buat_pinjaman() {
      $this->pesan->tampil_buku('BS1009');
      $this->pesan->tampil_judul('Menjadi Pebisnis Ulung');
      $this->pesan->tampil_penulis('Eddy Soegoto');
      $this->pesan->atur_tampilan();
    }
    public function pinjam_buku() {
      return $this->pesan- pinjam_buku();
    }
}

  $buat = new Buat_Pinjaman();
  $prosedur = new Prosedur_pinjaman
 ($buat);
  $prosedur->buat_pinjaman();
  $peminjaman = $prosedur- pinjam_buku();
  echo $peminjaman->tampil_pinjaman();

?>