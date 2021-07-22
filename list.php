<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>

<body>
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="card w-75">
            <div class="card-header text-center">
                <h5 class="card-title">My TODO List</h5>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <?= count($tasks)==0?'<h5 class="text-secondary text-center">No TODO items found</h5>':'' ?>
                    <ul class="todo-list px-3">
                        <?php foreach ($tasks as $task) { ?>
                            <li class="d-flex justify-content-between py-3<?= $task['status'] == 1 ? ' line-through' : '' ?>">
                                <?= $task['name'] ?>
                                <div class="d-flex">
                                    <form action="/updateItem" method="POST">
                                        <input type="hidden" name="id" value="<?= $task['todo_id'] ?>">
                                        <?php if ($task['status'] == 0) { ?>
                                            <input type="submit" class="btn btn-sm btn-success" name="complete" value="Complete">
                                        <?php } else { ?>
                                            <input type="submit" class="btn btn-sm btn-warning" name="undo" value="Undo">
                                        <?php } ?>
                                    </form>
                                    <form action="/deleteItem" method="POST">
                                        <input type="hidden" name="id" value="<?= $task['todo_id'] ?>">
                                        <input type="submit" class="btn btn-sm btn-danger ml-2" name="delete" value="Delete">
                                    </form>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <form action="/addItem" method="POST" class="input-group w-100">
                    <input type="text" class="input-control col-10" name="todo" autocomplete="off" placeholder="Enter a task">
                    <div class="col-2 px-2">
                        <input type="submit" name="submit" class="btn btn-primary w-100" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>