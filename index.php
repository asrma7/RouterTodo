<?php

include_once 'Request.php';
include_once 'Router.php';
require_once 'connect.php';
require_once 'controller.php';
$router = new Router(new Request);

$router->get('/', function () {
    try {
        $conn = new PDO('sqlite:database.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM TODO");
        $stmt->execute();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('failed to connect to database');
    }
    require_once 'list.php';
});

$router->post('/addItem', function ($request) {
    addItem($request);
});

$router->post('/deleteItem', function ($request) {
    deleteItem($request);
});

$router->post('/updateItem', function ($request) {
    updateItem($request);
});

$router->get('/list', function ($request) {
    return getList($request);
});
