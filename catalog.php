<?php
session_start();
require 'db.php';
if (isset( $_GET['do'] ) == 'logout'){
    unset($_SESSION['login']);
    session_destroy();
    $status = [
        "Status" => 200,
        "Message" => "OK",
    ];
    $jsonResult = json_encode($status);
    echo $jsonResult;
}

if (!$_SESSION['login']){
    header("Location: index.php");
    exit;
}

if (isset($_SESSION["login"])) {
    // Показываем, что пользователь аутентифицирован
    $status = $_SESSION["login"];
    $jsonResult = json_encode($status);
    echo $jsonResult;
}
else {
    // Выводим ошибку
    $error = [
        "Status" => 401,
        "Message" => "Unauthorized",
    ];
    $jsonError = json_encode($error);
    echo $jsonError;
}
?>
<a href="?do">Выход</a>

<?php
$catalog = $db-> query("SELECT * FROM `catalog`");
        while( $res = mysqli_fetch_assoc($catalog)) {
            echo '
                <a href="tovar.php?id=' . $res['id'] . '">
                    <div class="name">
                        ' . $res['name'] . '
                    </div>
                </a>
                <div class="img">
                    ' . $res['img'] . '.
                </div>';
}