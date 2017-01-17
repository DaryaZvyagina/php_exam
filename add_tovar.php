<?php
if(isset($_GET['add_tovar'])) {
    echo '
    <form enctype="multipart/form-data" method="post">
        <input name="name" placeholder="Название"> 
        <input name="price" placeholder="Текст"> 
        <select name="category">
        ';
    $category = $db->query("SELECT * FROM `catalog`");
    while ($result = mysqli_fetch_assoc($category)) {
        echo '<option value="' . $result['id'] . '">' . $result['name'] . '</option>';
    }
    echo '
        </select>
        <input type="file" name="picture">
        <input type="submit" name="add_t">
    </form>
    ';


    if(isset($_POST['add_t'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $path = "tovar/";
        $photo = time().$_FILES['picture']['name'];
        copy($_FILES['picture']['tmp_name'],$path.time().$_FILES['picture']['name']);
        $db->query("INSERT INTO `tovar` (`name`,`price`,`category_id`,`img`) VALUES ('$name','$price','$category','$photo')");

    }
}