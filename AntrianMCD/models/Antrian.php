<?php
class Antrian
{
    // Connection
    private $conn;
    // Table
    private $db_table = "antrian";
    // Columns
    public $id;
    public $w_datang;
    public $s_kedatangan;
    public $awalpelayanan;
    public $s_pelayanankasir;
    public $selesai;
    public $s_keluarantrian;

    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GET ALL
    public function getAntrians()
    {
        $sqlQuery = "SELECT id, w_datang, s_kedatangan, awalpelayanan, s_pelayanankasir, selesai, s_keluarantrian FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createAntrian()
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . "
            SET
            w_datang = :w_datang,
            s_kedatangan = :s_kedatangan,
            awalpelayanan = :awalpelayanan,
            s_pelayanankasir = :s_pelayanankasir,
            selesai = :selesai,
            s_keluarantrian = :s_keluarantrian";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        // (Tetapkan sanitize sesuai kebutuhan)

        // bind data
        $stmt->bindParam(":w_datang", $this->w_datang);
        $stmt->bindParam(":s_kedatangan", $this->s_kedatangan);
        $stmt->bindParam(":awalpelayanan", $this->awalpelayanan);
        $stmt->bindParam(":s_pelayanankasir", $this->s_pelayanankasir);
        $stmt->bindParam(":selesai", $this->selesai);
        $stmt->bindParam(":s_keluarantrian", $this->s_keluarantrian);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

// UPDATE
    public function updateData(){
        $sqlQuery = "UPDATE
        ". $this->db_table ."
        SET
        w_datang = :w_datang, 
        s_kedatangan = :s_kedatangan, 
        awalpelayanan = :awalpelayanan, 
        s_pelayanankasir = :s_pelayanankasir, 
        selesai = :selesai,
        s_keluarantrian = :s_keluarantrian
        WHERE 
        id = :id";
          $stmt = $this->conn->prepare($sqlQuery);
                  $this->w_datang=htmlspecialchars(strip_tags($this->w_datang));
                  $this->s_kedatangan=htmlspecialchars(strip_tags($this->s_kedatangan));
                  $this->awalpelayanan=htmlspecialchars(strip_tags($this->awalpelayanan));
                 $this->s_pelayanankasir=htmlspecialchars(strip_tags($this->s_pelayanankasir));
                  $this->selesai=htmlspecialchars(strip_tags($this->selesai));
                  $this->s_keluarantrian=htmlspecialchars(strip_tags($this->s_keluarantrian));
                  $this->id=htmlspecialchars(strip_tags($this->id));
      // bind data
          $stmt->bindParam(":w_datang", $this->w_datang);
                  $stmt->bindParam(":s_kedatangan", $this->s_kedatangan);
                  $stmt->bindParam(":awalpelayanan", $this->awalpelayanan);
                  $stmt->bindParam(":s_pelayanankasir", $this->s_pelayanankasir);
                  $stmt->bindParam(":selesai", $this->selesai);
                  $this->s_keluarantrian=htmlspecialchars(strip_tags($this->s_keluarantrian));
                  $stmt->bindParam(":id", $this->id);
              
                  if($stmt->execute()){
                     return true;
                  }
                  return false;
      }

    // DELETE
    public function deleteAntrian()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function generateKesimpulan()
    {
        $sqlQuery = "SELECT 
    MIN(s_kedatangan) AS min_sk,
    MAX(s_kedatangan) AS max_sk,
    AVG(s_kedatangan) AS avg_sk, 
    MIN(s_pelayanankasir) AS min_spk, 
    MAX(s_pelayanankasir) AS max_spk,
    AVG(s_pelayanankasir) AS avg_spk
    FROM " . $this->db_table;
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
       $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->sk_min= $dataRow['min_sk'];
        $this->sk_max= $dataRow['max_sk'];
        $this->sk_avg = $dataRow['avg_sk'];
        $this->spk_min = $dataRow['min_spk'];
        $this->spk_max= $dataRow['max_spk'];
        $this->spk_avg = $dataRow['avg_spk'];
    }
}
