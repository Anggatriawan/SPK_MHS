<?php

namespace App\Models;

use CodeIgniter\Model;

class MhsModel extends Model
{
    protected $table                = 'tbl_mhs';
    protected $primaryKey           = 'id_mhs';
    protected $allowedFields        = ['nim_mhs', 'password_mhs', 'nama_mhs', 'tempat_lahir', 'tgl_lahir', 'email', 'jurusan_mhs', 'alamat', 'tahun_angkatan', 'semester', 'ipk', 'file_ipk', 'prestasi', 'file_prestasi', 'pengabdian_masyarakat', 'file_pengabdian_masyarakat', 'organisasi', 'file_organisasi', 'foto_mhs', 'tgl_input', 'status'];

    protected $column_order = array(null, 'nama_mhs', 'tempat_lahir', 'tgl_lahir', 'email', 'jurusan_mhs', 'alamat', 'tahun_angkatan', 'semester', 'ipk', 'file_ipk', 'prestasi', 'file_prestasi', 'pengabdian_masyarakat', 'file_pengabdian_masyarakat', 'organisasi', 'file_organisasi', 'foto_mhs', 'tgl_input', 'status', null);
    protected $column_search = array('nim_mhs', 'password_mhs', 'nama_mhs', 'tempat_lahir', 'tgl_lahir', 'email', 'jurusan_mhs', 'alamat', 'tahun_angkatan', 'semester', 'ipk', 'file_ipk', 'prestasi', 'file_prestasi', 'pengabdian_masyarakat', 'file_pengabdian_masyarakat', 'organisasi', 'file_organisasi', 'foto_mhs', 'tgl_input', 'status');
    protected $order = array('nama_mhs' => 'asc');
    protected $db;
    protected $dt;

    function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
        $this->dt = $this->db->table($this->table);
    }

    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $_POST['search']['value']);
                } else {
                    $this->dt->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->dt->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();

        if ($_POST['length'] != -1) {
            $this->dt->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->dt->get();
        return $query->getResult();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }

    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table)
            ->where('id_mhs !=', decrypt_url(session()->get('id_mhs')));;
        return $tbl_storage->countAllResults();
    }

 
}
