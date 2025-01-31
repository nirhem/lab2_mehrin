<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");


$host = "localhost";
$db_name = "lab2_database";
$username = "root";
$password = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();
    
    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode(["status" => "success", "user" => $user]);

} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
