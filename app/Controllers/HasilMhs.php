<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HasilModelMhs;

class HasilMhs extends BaseController
{
    function __construct()
    {
        
    }

    public function index()
    {
        $data = [
            'title' => 'Manajemen User'
        ];

        return view('hasil_mhs', $data);
    }

    public function ajaxList()
    {
        //load model alternative
        $model = new HasilModelMhs();

        if ($this->request->isAJAX()) {
            //ambil data
            $lists = $model->get_datatables();

            $data = [];
            $no = $this->request->getPost("start");
            $rang=0;

            foreach ($lists as $list) {
          
                $no++;
                $rang++;
                $row = [];
                $row[] = $no;
                $row[] = $list->nama_alternative;
                $row[] = $list->hasil;
                $row[] = "Rangking : ".$rang;
                $data[] = $row;
            }

            $output = [
                "draw" => $this->request->getPost('draw'),
                "recordsTotal" => $model->count_all(),
                "recordsFiltered" => $model->count_filtered(),
                "data" => $data
            ];

            $output[csrf_token()] = csrf_hash();
            echo json_encode($output);
        }
    }
}
