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
                            <h3>Добавить пользователя</h3>
                            <form method="POST" action="">
                <div>
                        <label for="login">Логин</label>
                        <input type="text" name="login" value="">
                </div>
                <div>
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
</html>