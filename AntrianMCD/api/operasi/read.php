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
$table_name = 'antrian';

if (isset($_GET['id'])) {
    $item = new Antrian($db, $table_name);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();

    try {
        $item->getAntrians();

        if ($item->w_datang != null) {
            $response = array(
                "id" => $item->id,
                "w_datang" => $item->w_datang,
                "s_kedatangan" => $item->s_kedatangan,
                "awalpelayanan" => $item->awalpelayanan,
                "s_pelayanankasir" => $item->s_pelayanankasir,
                "selesai" => $item->selesai,
                "s_keluarantrian" => $item->s_keluarantrian,
            );

            http_response_code(200);
            echo json_encode($response);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "Antrian not found."));
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Internal Server Error: " . $e->getMessage()));
    }
} else {
    $items = new Antrian($db, $table_name);

    try {
        $stmt = $items->getAntrians();

        $itemCount = $stmt->rowCount();

        if ($itemCount > 0) {
            $AntrianArr = array();
            $AntrianArr["body"] = array();
            $AntrianArr["itemCount"] = $itemCount;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $antrianItem = array(
                    "id" => $id,
                    "w_datang" => $w_datang,
                    "s_kedatangan" => $s_kedatangan,
                    "awalpelayanan" => $awalpelayanan,
                    "s_pelayanankasir" => $s_pelayanankasir,
                    "selesai" => $selesai,
                    "s_keluarantrian" => $s_keluarantrian,
                );
                array_push($AntrianArr["body"], $antrianItem);
            }

            echo json_encode($AntrianArr);
        } else {
            http_response_code(404);
            echo json_encode(array("message" => "No record found."));
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Internal Server Error: " . $e->getMessage()));
    }
}
?>
