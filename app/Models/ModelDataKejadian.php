<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class ModelDataKejadian extends Model
{
    protected $table = "kejadian";
    protected $column_order = array(null, 'no_laporan', 'tgl_laporan', 'kategori_laporan', 'tipe_kejadian', 'waktu_kejadian', 'status_kejadian', 'cuaca_kejadian', 'kode_lokasi', 'ruas', 'lajur_kejadian', 'wilayah', null);
    protected $column_search = array('no_laporan', 'kategori_laporan', 'tgl_laporan', 'status_kejadian');
    protected $order = array('id_kejadian' => 'DESC');
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
                ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
                ->join('sta_system', 'id_sta=sta_id')
                ->join('status_kejadian', 'id_status=status_id')
                ->where(['kejadian.deleted_at' => null, 'kejadian.kode_pt' => $pt])
                ->orderBy('waktu_kejadian', 'DESC');
        } else {
            $this->dt = $this->db->table($this->table)
                ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
                ->join('sta_system', 'id_sta=sta_id')
                ->join('status_kejadian', 'id_status=status_id')
                ->where(['kejadian.deleted_at' => null, 'kejadian.kode_pt' => $pt])
                ->where('DATE(waktu_kejadian) >=', $tglawal)
                ->where('DATE(waktu_kejadian) <=', $tglakhir)
                ->orderBy('waktu_kejadian', 'DESC');
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
                ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
                ->join('sta_system', 'id_sta=sta_id')
                ->join('status_kejadian', 'id_status=status_id')
                ->where(['kejadian.deleted_at' => null, 'kejadian.kode_pt' => $pt])
                ->orderBy('waktu_kejadian', 'DESC');
        } else {
            $tbl_storage = $this->db->table($this->table)
                ->join('penerimaan_laporan', 'id_pelapor=laporan_id')
                ->join('sta_system', 'id_sta=sta_id')
                ->join('status_kejadian', 'id_status=status_id')
                ->where(['kejadian.deleted_at' => null, 'kejadian.kode_pt' => $pt])
                ->where('DATE(waktu_kejadian) >=', $tglawal)
                ->where('DATE(waktu_kejadian) <=', $tglakhir)
                ->orderBy('waktu_kejadian', 'DESC');
        }

        return $tbl_storage->countAllResults();
    }
}
