<?php
function userLogin(){
    $db=\Config\Database::connect();
return $db->table('tbl_user', session('id_user'))->get()->getRow();

}

function countData($table){
$db=\Config\Database::connect();
return $db->table($table)->countAllResults();
}



function getUserMhs1(){
    $db=\Config\Database::connect();
    return $db->table('tbl_user_mhs')
    ->join('tbl_mhs','tbl_mhs.id_mhs=tbl_user_mhs.id_mhs')
    ->get()->getRow();
}


?>