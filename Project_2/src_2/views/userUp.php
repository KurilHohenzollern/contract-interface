<html>
<body>
<th scope="row">
                <h3>Редактировать пользователей</h3>
                <form method="POST" action="">
                    <div>
                        <label for="login">Логин</label>
                        <input type="text" name="login" value="">
                    </div>

                    <div>
                        <label for="firstname">Имя</label>
                        <input type="text" name="first_name" value="">
                    </div>
                    <div>
                        <label for="lastname">Фамилия</label>
                        <input type="text" name="lastname" value="">
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
</html>