<?php
require 'db.php';
?>
<html>
<head>

</head>
<body>

    <ul>
        <li><a href="?add_tovar">Добавить товар</a></li>
        <li><a href="?delete_tovar">Удалить товар</a></li>
        <li><a href="?update_tovar">Изменить товар</a></li>
        <li><a href="?add_rubrica">Добавить категорию</a></li>
        <li><a href="?delete_rubrika">Удалить категорию</a></li>
        <li><a href="?update_rubrika">Изменить категорию</a></li>
    </ul>

<?php
include "add_tovar.php"
?>

</body>
</html>
