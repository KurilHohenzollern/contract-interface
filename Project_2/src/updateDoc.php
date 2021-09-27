<?php

/*require_once __DIR__ . '/DocController.php';
$controller = new DocController();*/

if (!empty($_POST)) {
    $action = $_POST["action"];
    switch ($action) {
        case 'deleteUser':
            //$controller->delete($_POST['id']);
            
            $mustDelete = $_POST['id'];
            $fileDelete = unlink("data/docs/{$mustDelete}.json");
            
            break;
        case 'updateUser':
            ;
            break;
        default:
            die("Неизвестное действие");
    }

    header("Location: updateDoc.php");
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
                    <th scope="col">Удалить</th>
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
                        <td><?= $parameter['beginTerm'], ['endTerm'] ?></td>
                        <td><?= $parameter['scopeOfTheAgreement'] ?></td>
                        <td><?= $parameter['amount'] ?></td>
                        <td><?= $parameter['address'], ['taxesID'], ['payment'] ?></td>
                        <td>
                            <a href="?id=<?php echo $parameter['id']?>">Edit</a>
                        <form method="POST" action="/updateDoc.php">
                            <input type="hidden" name="id" value="<?= $parameter['id'] ?>">
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
                <h3>Изменить данные</h3>
                <form method="POST" action="/update.php">
                    <div>
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

                    <input type="submit" value="изменить">
                    <input type="hidden" name="action" value="updateUser">
                </form>
            </th>
        </tr>

</body>

<body>