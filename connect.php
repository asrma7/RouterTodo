<?php
try {
    $conn = new PDO('sqlite:database.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('failed to connect to database');
}
