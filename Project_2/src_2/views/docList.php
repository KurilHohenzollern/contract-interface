<html>
<table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Организация</th>
                    <th scope="col">Контрагент</th>
                    <th scope="col">Подписант</th>
                    <th scope="col">Начало действия договора</th>
                    <th scope="col">Конец действия договора</th>
                    <th scope="col">Предмет договора</th>
                    <th scope="col">Сумма договора</th>
                    <th scope="col">Реквизиты</th>
                    <th scope="col">Адрес</th>
                    <th scope="col">ИНН</th>
                    <th scope="col">Рассчётный счёт</th>

                </tr>
            </thead>
            <tbody>

                <?php
                
                
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