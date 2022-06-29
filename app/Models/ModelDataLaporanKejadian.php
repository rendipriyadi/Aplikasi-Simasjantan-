<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ModelDataLaporanKejadian extends Model
{
    protected $table = "penerimaan_laporan";
    protected $column_order = array(null, 'no_laporan', 'tgl_laporan', 'nama_pelapor', 'kategori_laporan', 'kontak_pelapor', 'notlp_pelapor', 'deskripsi_informasi', 'deskripsi_gangguan', null);
    protected $column_search = array('no_laporan', 'nama_pelapor', 'tgl_laporan');
    protected $order = array('id_pelapor' => 'DESC');
    protected $request;
    protected $db;
    protected $dt;

    function __construct(RequestInterface $request)
    {
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
    }
    private function _get_datatables_query($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        if ($tglawal == '' && $tglakhir == '') {
            $this->dt = $this->db->table($this->table)
                ->join('sumber_informasi', 'id_informasi=informasi_id')
                ->join('gangguan', 'id_gangguan=gangguan_id')
                ->where(['penerimaan_laporan.deleted_at' => null, 'penerimaan_laporan.kejadian_id' => null, 'penerimaan_laporan.kode_pt' => $pt])
                ->orderBy('tgl_laporan', 'DESC');
        } else {
            $this->dt = $this->db->table($this->table)
                ->join('sumber_informasi', 'id_informasi=informasi_id')
                ->join('gangguan', 'id_gangguan=gangguan_id')
                ->where(['penerimaan_laporan.deleted_at' => null, 'penerimaan_laporan.kejadian_id' => null, 'penerimaan_laporan.kode_pt' => $pt])
                ->where('tgl_laporan >=', $tglawal)
                ->where('tgl_laporan <=', $tglakhir)
                ->orderBy('tgl_laporan', 'DESC');
        }

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    function get_datatables($tglawal, $tglakhir)
    {
        $this->_get_datatables_query($tglawal, $tglakhir);
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }
    function count_filtered($tglawal, $tglakhir)
    {
        $this->_get_datatables_query($tglawal, $tglakhir);
        return $this->dt->countAllResults();
    }
    public function count_all($tglawal, $tglakhir)
    {
        $this->session = \Config\Services::session();
        $pt = $this->session->get('kode_pt');

        if ($tglawal == '' && $tglakhir == '') {
            $tbl_storage = $this->db->table($this->table)
                ->join('sumber_informasi', 'id_informasi=informasi_id')
                ->join('gangguan', 'id_gangguan=gangguan_id')
                ->where(['penerimaan_laporan.deleted_at' => null, 'penerimaan_laporan.kejadian_id' => null, 'penerimaan_laporan.kode_pt' => $pt])
                ->orderBy('tgl_laporan', 'DESC');
        } else {
            $tbl_storage = $this->db->table($this->table)
                ->join('sumber_informasi', 'id_informasi=informasi_id')
                ->join('gangguan', 'id_gangguan=gangguan_id')
                ->where(['penerimaan_laporan.deleted_at' => null, 'penerimaan_laporan.kejadian_id' => null, 'penerimaan_laporan.kode_pt' => $pt])
                ->where('tgl_laporan >=', $tglawal)
                ->where('tgl_laporan <=', $tglakhir)
                ->orderBy('tgl_laporan', 'DESC');
        }

        return $tbl_storage->countAllResults();
    }
}
