<html>
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
                    <th scope="col">Изменить</th>
                    <th scope="col">Удалить</th>
                </tr>
            </thead>
            <tbody>

                <?php

                foreach ($parameters as $parameter) : ?>
                    <tr>
                        <th scope="row"><?= $parameter['id'] ?></th>
                        <td><?= $parameter['login'] ?></td>
                        <td><?= $parameter['firstName'] ?></td>
                        <td><?= $parameter['lastName']?></td>
                        <td><?= $parameter['birthd']  ?></td>
                        <td><?= $parameter['active'] ?></td>
                        <td>
                            <a href="?id=<?php echo $parameter['id']?>">Edit</a>
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $parameter['id'] ?>">
                            <input type="submit" value="изменить">
                            <input type="hidden" name="action" value="updateUser">
                        </form>
                        </td>
                        <td>
                        <form method="POST" action="/userlist">
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
</html>