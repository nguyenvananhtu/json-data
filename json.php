<?php

$host = 'localhost';
$dbname = 'nguyenvananhtu_qlgv';
$username = 'root';
$password = '';


try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $stmt = $conn->prepare('SELECT * from nhanvien');
    $stmt->execute();
    $mang = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['MaNV'];
        $tennv = $row['TenNV'];
        $sdt = $row['SDT'];
        array_push($mang, new NhanVien($id, $tennv, $sdt));
    }

    echo json_encode($mang);

} catch (PDOException $pe) {
    die ("Could not connect to the database $dbname :" . $pe->getMessage());
}

class NhanVien
{
    public $id;
    public $Tennv;
    public $Sodt;

    public function __construct($i, $t, $s)
    {
        $this->id = $i;
        $this->Tennv = $t;
        $this->Sodt = $s;
    }
}
?>