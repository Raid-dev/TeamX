<?php
require_once 'C:\xampp\htdocs\PHP - Rauf\TeamX\php\config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $query = "DELETE FROM users WHERE ID = :id";
    $stmt = $ob->conn->prepare($query);
    $stmt->bindParam(':id', $userId);   
    if ($stmt->execute()) {      
        header("Location: adminPage.php");
        exit;
    } else {
        echo " Error occured.";
    }
}
?>