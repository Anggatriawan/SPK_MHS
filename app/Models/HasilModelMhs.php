<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModelMhs extends Model
{
    protected $DBGroup              = 'default';

    protected $table                = 'tbl_hasil';
    protected $primaryKey           = '';
    protected $allowedFields        = ['id_alternative', 'hasil'];

    protected $column_order = array(null, 'id_alternative', 'hasil', null);
    protected $column_search = array('id_alternative', 'hasil');
    protected $order = array('hasil' => 'DESC');
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
        $this->dt->join('tbl_alternative', 'tbl_alternative.id_alternative = tbl_hasil.id_alternative');

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
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }

    public function getAlternative()
    {
        return $this->dt->select(
            'tbl_alternative.id_alternative AS id_alternative,
            kode_alternative,
            nama_alternative'
        )
            ->join('tbl_penilaian', 'tbl_penilaian.id_alternative = tbl_alternative.id_alternative')
            ->groupBy('tbl_alternative.id_alternative, kode_alternative, nama_alternative')
            ->get();
    }
}


