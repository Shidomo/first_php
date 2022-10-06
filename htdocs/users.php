<!DOCTYPE html>
<html lang="ru">

<head>
    <?php
    $website_title = "Список всех пользователей на сайте";
    require "blocks/head.php";
    ?>
</head>

<body>
    <?php require "blocks/header.php" ?>

    <main>
        <h1>Список пользователей</h1>
        <?php
        require_once 'lib/mysql.php';

        // Получаем и выводим всех пользователей
        $sql = 'SELECT * FROM `users`';
        $query = $pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($users as $el) {
            // Также указываем кнопку и в качестве id для блока указываем id записи
            // через этот id мы сможем удалить блок используя jQuery
            echo '<div class="block-user" id="' . $el['id'] . '">
              <b>Имя:</b> ' . $el['name'] . ', <b>логин:</b> ' . $el['login'] . '
              <button onclick="deleteUser(\'' . $el['id'] . '\')" class="btn btn-danger">Удалить</button>
            </div>';
        }
        ?>
    </main>

    <?php require "blocks/aside.php" ?>
    <?php require "blocks/footer.php" ?>
    <script>
        // Функция вызывается при нажатии на кнопку удалить
        // она принимает id записи, которую нужно удалить
        function deleteUser(id) {
            $.ajax({
                url: 'ajax/deleteUser.php',
                type: 'POST',
                cache: false,
                data: {
                    'id': id
                },
                dataType: 'html',
                success: function(data) {
                    alert(data);
                    // После успешного выполнения происходит удаление блока с записью
                    $('#' + id).remove();
                }
            });
        }
    </script>
</body>

</html>