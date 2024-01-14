<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");

include_once '../../config/database.php';
include_once '../../models/Antrian.php';

$database = new Database();
$db = $database->getConnection();
$item = new Antrian($db);
$data = json_decode(file_get_contents("php://input"));
$item->id = $data->id;
$item->w_datang = date('i:s');
$item->s_kedatangan = $data->s_kedatangan;
$item->awalpelayanan = date('i:s');
$item->s_pelayanankasir = $data->s_pelayanankasir;
$item->selesai = date('i:s');
$item->s_keluarantrian = $data->s_keluarantrian;
if($item->updateData()){
 echo json_encode(['message'=>'Data berhasil terupdate!']);
    } else{
        echo json_encode(['message'=>'Data gagal diupdate!']);
}
?>
