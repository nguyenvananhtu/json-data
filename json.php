<?php

$host = 'localhost';
$dbname = 'nguyenvananhtu_QLGV';
$username = 'root';
$password = '';


try {
    // Kết nối đến cơ sở dữ liệu
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn lấy thông tin từ bảng User
    $stmtUser = $conn->prepare('SELECT * FROM nguyenvananhtu_User');
    $stmtUser->execute();
    $users = $stmtUser->fetchAll(PDO::FETCH_ASSOC);

    // Truy vấn lấy thông tin từ bảng Giáo viên
    $stmtTeacher = $conn->prepare('SELECT * FROM nguyenvananhtu_GiaoVien');
    $stmtTeacher->execute();
    $teachers = $stmtTeacher->fetchAll(PDO::FETCH_ASSOC);

    // Chuẩn bị dữ liệu để trả về dưới dạng JSON
    $data = array(
        'users' => $users,
        'teachers' => $teachers
    );

    // Trả về dữ liệu dưới dạng JSON
    echo json_encode($data);

} catch (PDOException $pe) {
    // Xử lý lỗi nếu có
    die ("Could not connect to the database $dbname :" . $pe->getMessage());
}

?>
