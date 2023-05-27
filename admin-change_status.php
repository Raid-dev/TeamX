<?php
require_once 'C:\xampp\htdocs\PHP - Rauf\TeamX\php\config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_GET['id'];
    $action = $_GET['action'];

    $newStatus = $action === 'activate' ? 1 : 0;

    $query = "UPDATE users SET Activity = ? WHERE ID = ?";
    $stmt = $ob->conn->prepare($query);
    $stmt->execute([$newStatus, $userId]);

    if ($stmt->rowCount() > 0) {
        header("Location: adminPage.php");
        exit();
    } else {
        echo "Error updating status.";
    }
}
?>
