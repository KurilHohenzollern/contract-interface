<html>
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
            <form method="POST" action="/create">
                <div>
    <tr>
    <label for="company">Организация</label>
        <input type="text" name="company" value="<?= $parameter['company'] ?>" required>
</div>
<div>
    <label for="contractor">Контрагент</label>
    <input type="text" name="contractor" value="<?= $parameter['contractor'] ?>" required>
</div>

<div>
    <label for="signer">Подписант</label>
    <input type="data" name="signer" value="<?= $parameter['signer'] ?>" required>
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