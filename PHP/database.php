<?php

$type_db = "localhost";
$user_db = "root";
$password_db = "";
$db_name = "music_shop";

$conn = new mysqli($type_db,$user_db,$password_db,$db_name);

mysqli_set_charset($conn,"utf8");

?>