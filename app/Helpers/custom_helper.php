<?php

use PHPSQLParser\builders\LikeBuilder;

function hitungKejadianHariIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('status_kejadian', 'status_id = id_status')
        ->where(['deskripsi_status' => 'SELESAI', 'kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y-m-d') . '%')
        ->countAllResults();
}

function hitungKejadianBulanIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('status_kejadian', 'status_id = id_status')
        ->where(['deskripsi_status' => 'SELESAI', 'kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y-m') . '%')
        ->countAllResults();
}

function hitungKejadianTahunIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('status_kejadian', 'status_id = id_status')
        ->where(['deskripsi_status' => 'SELESAI', 'kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function hitungLaporanHariIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('penerimaan_laporan')
        ->where('kode_pt', $pt)
        ->like('tgl_laporan', '%' . date('Y-m-d') . '%')
        ->countAllResults();
}

function hitungLaporanBulanIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('penerimaan_laporan')
        ->where('kode_pt', $pt)
        ->like('tgl_laporan', '%' . date('Y-m') . '%')
        ->countAllResults();
}

function hitungLaporanTahunIni()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('penerimaan_laporan')
        ->where('kode_pt', $pt)
        ->like('tgl_laporan', '%' . date('Y') . '%')
        ->countAllResults();
}

function totalKematian()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('korban_kecelakaan')
        ->join('kejadian', 'kejadian_id = id_kejadian')
        ->where(['kondisi_korban' => 'MENINGGAL', 'korban_kecelakaan.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}
function totalLukaRingan()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('korban_kecelakaan')
        ->join('kejadian', 'kejadian_id = id_kejadian')
        ->where(['kondisi_korban' => 'LUKA RINGAN', 'korban_kecelakaan.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}
function totalLukaBerat()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('korban_kecelakaan')
        ->join('kejadian', 'kejadian_id = id_kejadian')
        ->where(['kondisi_korban' => 'LUKA BERAT', 'korban_kecelakaan.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function nonKecelakaan()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->where(['tipe_kejadian' => 'non kecelakaan', 'kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function kecelakaan()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->where(['tipe_kejadian' => 'kecelakaan', 'kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function radioKomunikasi()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('penerimaan_laporan', 'laporan_id = id_pelapor')
        ->join('sumber_informasi', 'informasi_id = id_informasi')
        ->where(['deskripsi_informasi' => 'RADIO KOMUNIKASI', 'kejadian.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function cctvSenkom()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('penerimaan_laporan', 'laporan_id = id_pelapor')
        ->join('sumber_informasi', 'informasi_id = id_informasi')
        ->where(['deskripsi_informasi' => 'PEMANTAUAN CCTV SENKOM', 'kejadian.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function telepon()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('penerimaan_laporan', 'laporan_id = id_pelapor')
        ->join('sumber_informasi', 'informasi_id = id_informasi')
        ->where(['deskripsi_informasi' => 'TELEPON', 'kejadian.kode_pt' => $pt])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}

function sosialMedia()
{
    $db = \Config\Database::connect();
    $session = \Config\Services::session();
    $pt = $session->get('kode_pt');

    return $db->table('kejadian')
        ->join('penerimaan_laporan', 'laporan_id = id_pelapor')
        ->join('sumber_informasi', 'informasi_id = id_informasi')
        ->where('kejadian.kode_pt', $pt)
        ->whereIn('deskripsi_informasi', ['WHATSAPP', 'INSTAGRAM', 'TWITTER'])
        ->like('waktu_kejadian', '%' . date('Y') . '%')
        ->countAllResults();
}
