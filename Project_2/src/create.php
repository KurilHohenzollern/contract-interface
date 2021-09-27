<?php


if (!empty($_POST)) {
    $action = $_POST["action"];
    switch ($action) {
        case 'addUser':
            $data = ['firstName' => $_POST['firstName'], 'lastName' => $_POST['lastName'], 'birthd' => $_POST['birthd'], 'active' => $_POST['active']];
            $manyFiles = opendir('data/users');
            $countJson = 0;
            while ($file = readdir($manyFiles)) {
            if ($file == '.' || $file == '..' || is_dir('data/users' . $file)) {
                continue;
            }
            $countJson++;
            }

            file_put_contents("data/users/{$countJson}.json", json_encode($data, JSON_UNESCAPED_UNICODE));


            break;
        case 'updateUser':;
            break;
        default:
            die("Неизвестное действие");
    }
    header("Location: create.php");
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
                </tr>
            </thead>
            <tbody>

                <?php

                $dir = 'data/users';
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file == "." || $file == "..") continue;
                    $data = file_get_contents('data/users/' . $file);
                    $arr = json_decode($data, true);
                    $arr['id'] = str_replace('.json', '', $file);
                    $parameters[] = $arr;
                }

                foreach ($parameters as $parameter) : ?>
                    <tr>
                        <th scope="row"><?= $parameter['id'] ?></th>
                        <td><?= $parameter['firstName'] ?></td>
                        <td><?= $parameter['lastName']?></td>
                        <td><?= $parameter['birthd']  ?></td>
                        <td><?= $parameter['active'] ?></td>
                        <td><?= $parameter[5] ?></td>

                <?php
                endforeach;
                ?>
            </tbody>

            <body>
                <div class="container">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <td></td>
                            </tr>
                        </thead>
                    </table>
                    <tr>
                        <th scope="row">
                            <h3>Добавить пользователя</h3>
                            <form method="POST" action="">
                                <div>
                    <tr>
                        <label for="firstName">Имя</label>
                        <input type="text" name="firstName" value="">
                </div>
                <div>
                    <label for="lastName">Фамилия</label>
                    <input type="text" name="lastName" value="">
                </div>
                <div>
                    <label for="birthd">Дата рождения</label>
                    <input type="data" name="birthd" value="">
                </div>

                <div>
                    <label for="active">Активность</label>
                    <input type="checkbox" name="active" value="">
                </div>

                <input type="submit" value="Добавить">
                <input type="hidden" name="action" value="addUser">
                </form>
                </th>
                </tr>

            </body>

</html>