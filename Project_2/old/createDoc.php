<?php

require_once __DIR__ . '/CDocModel.php';
$controller = new DocModel();

if (!empty($_POST)) {
    $action = $_POST["action"];
    switch ($action) {
        case 'addContract':
            $controller->create(
                $_POST['company'],
                $_POST['contractor'],
                $_POST['signer'],
                $_POST['beginTerm'],
                $_POST['endTerm'],
                $_POST['scopeOfTheAgreement'],
                $_POST['amount'],
                $_POST['address'],
                $_POST['taxesID'],
                $_POST['payment']
            );
            break;
        default:
            die("Неизвестное действие");
    }
    header("Location: createDoc.php");
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
                    <th scope="col">Организация</th>
                    <th scope="col">Контрагент</th>
                    <th scope="col">Подписант</th>
                    <th scope="col">Срок договора</th>
                    <th scope="col">Предмет договора</th>
                    <th scope="col">Сумма договора</th>
                    <th scope="col">Реквизиты</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $dir = 'data/docs';
                $files = scandir($dir);
                foreach ($files as $file) {
                    if ($file == "." || $file == "..") continue;
                    $data = file_get_contents('data/docs/' . $file);
                    $arr = json_decode($data, true);
                    $arr['id'] = str_replace('.json', '', $file);
                    $parameters[] = $arr;
                }
                foreach ($parameters as $parameter) : ?>
                    <tr>
                        <th scope="row"><?= $parameter['id'] ?></th>
                        <td><?= $parameter['company'] ?></td>
                        <td><?= $parameter['contractor'] ?></td>
                        <td><?= $parameter['signer'] ?></td>
                        <td><?= $parameter['beginTerm'] ?></td>
                        <td><?= $parameter['endTerm'] ?></td>
                        <td><?= $parameter['scopeOfTheAgreement'] ?></td>
                        <td><?= $parameter['amount'] ?></td>
                        <td><?= $parameter['address'] ?></td>
                        <td><?= $parameter['taxesID'] ?></td>
                        <td><?= $parameter['payment'] ?></td>
                    </tr>

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
                            <h3>Добавить договор</h3>
                            <form method="POST" action="">
                                <div>
                    <tr>
                        <label for="company">Организация</label>
                        <input type="text" name="company" value="" required>
                </div>
                <div>
                    <label for="contractor">Контрагент</label>
                    <input type="text" name="contractor" value="" required>
                </div>

                <div>
                    <label for="signer">Подписант</label>
                    <input type="data" name="signer" value="" required>
                </div>

                <div>
                    <label for="term">Срок договора</label>
                    <label for="beginTerm">от</label>
                    <input type="date" name="beginTerm" value="" max="" min="" required>
                    <label for="endTerm">до</label>
                    <input type="date" name="endTerm" value="" max="" min="" required>
                </div>


                <div>
                    <label for="scopeOfTheAgreement">Предмет договора</label>
                    <input type="text" name="scopeOfTheAgreement" value="" required>
                </div>

                <div>
                    <label for="amount">Сумма договора</label>
                    <input type="text" name="amount" value=" ₽" required>
                </div>

                <div>
                    <label for="requisites">Реквизиты</label>
                    <input type="text" name="address" value="" required>
                    <input type="text" name="taxesID" value="" required>
                    <input type="text" name="payment" value="" required>
                </div>

                <input type="submit" value="Добавить">
                <input type="hidden" name="action" value="addContract">
                </form>
                </th>
                </tr>

            </body>

</html>