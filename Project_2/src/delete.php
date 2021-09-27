<?php


if (!empty($_POST)) {
    $action = $_POST["action"];
    switch ($action) {
        case 'deleteUser':
            
            break;
        case 'updateUser':
            
            break;
        default:
            die("Неизвестное действие");
    }

    header("Location: delete.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>HTML5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">Активность</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
               // $parameters = file_get_contents();
                foreach ($parameters as $parameter) : ?>
                    <tr>
                        <th scope="row"><?= $parameter[0] ?></th>
                        <td><?= $parameter[1] ?></td>
                        <td><?= $parameter[2] ?></td>
                        <td><?= $parameter[3] ?></td>
                        <td><?= $parameter[4] ?></td>
                        <td><?= $parameter[5] ?></td>
                        <td><?= $parameter[6] ?></td>
                        <td>
                            <form method="POST" action="/index.php">
                                <input type="hidden" name="id" value="">
                                <input type="submit" value="удалить">
                                <input type="hidden" name="action" value="deleteUser">
                            </form>
                        </td>
                    </tr>

                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <tr>
            <th scope="row">
                <h3>Редактировать пользователей</h3>
                <form method="POST" action="/admin_panel.php">
                    <div>
                        <label for="id">Номер</label>
                        <input type="text" name="id" value="">
                    </div>

                    <div>
                        <label for="first_name">Имя</label>
                        <input type="text" name="first_name" value="">
                    </div>
                    <div>
                        <label for="last_name">Фамилия</label>
                        <input type="text" name="last_name" value="">
                    </div>
                    <div>
                        <label for="birthd">Дата рождения</label>
                        <input type="text" name="birthd" value="">
                    </div>

                    <div>
                        <label for="active">Активность</label>
                        <input type="checkbox" name="active" value="">
                    </div>

                    <input type="submit" value="изменить">
                    <input type="hidden" name="action" value="updateUser">
                </form>
            </th>
        </tr>

</body>

<body>