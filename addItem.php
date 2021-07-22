<?php
require_once 'connect.php';
if(isset($_POST['submit']))
{
    $todo = $_POST['todo'];
    $stmt = $conn->prepare("INSERT INTO TODO (name) VALUES (:name)");
    $stmt->bindParam(':name', $todo);
    $stmt->execute();
}
header('Location:index.php');
?>