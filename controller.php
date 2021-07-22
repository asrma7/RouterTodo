<?php
function updateItem(IRequest $request)
{
    try {
        $conn = new PDO('sqlite:database.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('failed to connect to database');
    }
    $todo_id = $request->getBody()['id'];
    if ($request->getBody()['complete']) {
        $stmt = $conn->prepare("UPDATE TODO SET status = 1 WHERE todo_id = :id");
    } else if ($request->getBody()['undo']) {
        $stmt = $conn->prepare("UPDATE TODO SET status = 0 WHERE todo_id = :id");
    }
    $stmt->bindParam(':id', $todo_id);
    $stmt->execute();
    header('Location: /');
}
function addItem(IRequest $request)
{
    try {
        $conn = new PDO('sqlite:database.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('failed to connect to database');
    }
    $todo = $request->getBody()['todo'];
    $stmt = $conn->prepare("INSERT INTO TODO (name) VALUES (:name)");
    $stmt->bindParam(':name', $todo);
    $stmt->execute();
    header('Location: /');
}
function deleteItem(IRequest $request)
{
    try {
        $conn = new PDO('sqlite:database.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('failed to connect to database');
    }
    $todo_id = $request->getBody()['id'];
    $stmt = $conn->prepare("DELETE FROM TODO WHERE todo_id = :id");
    $stmt->bindParam(':id', $todo_id);
    $stmt->execute();
    header('Location: /');
}
function getList(Request $request)
{
    try {
        $conn = new PDO('sqlite:database.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('failed to connect to database');
    }
    $stmt = $conn->prepare("SELECT * FROM TODO");
    $stmt->execute();
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($tasks);
}
