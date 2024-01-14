<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/Antrian.php';

$database = new Database();
$db = $database->getConnection();
$item = new Antrian($db);
$item->generateKesimpulan();
if ($item->sk_avg != null) {
    // create response array
    $data_arr = array(
        "kesimpulan_waktu_tunggu" => "Pada entitas antrian yaitu entitas waktu tunggu
        pada 1 kasir MCD Solo Grand Mall memiliki waktu tunggu minimal sebesar " . round($item->sk_min) . " Menit dengan waktu tunggu maksimal sebesar " .
        round($item->sk_max) . " Menit dengan rata-rata waktu tunggu sebesar " .
        date('i:s', $item->sk_avg). " Menit",
        "kesimpulan_banyak_antrian" => "Pada entitas antrian yaitu entitas banyak antrian
        pada 1 kasir MCD Solo Grand Mall memiliki banyak antrian minimal sebesar " .
        round($item->spk_max)." Konsumen dengan rata_rata waktu tunggu sebesar ".$item->spk_avg." Konsumen dan jika dibulatkan menjadi ". round($item->spk_avg)." konsumen", 
    );

    http_response_code(200);
    echo json_encode($data_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "User not found."));
}
?>
