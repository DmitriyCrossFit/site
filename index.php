<?php
session_start();

header("Content-Type:text/html;charset=utf-8");

require_once ("config.php");
require_once ("classes/ACore.php");
require_once ("classes/ACore_admin.php");

if ($_GET ['option']) {
    $class = trim(strip_tags($_GET['option']));
}
else {
    $class = 'main';
}
if(file_exists("classes/".$class.".php")) {
    include ("classes/".$class.".php");
    if(class_exists($class)){

        $obj = new $class;
        $obj->get_body();
    }
    else {
        exit("<p>Не правильные данные для входа</p>");
    }
}
else {
    exit("<p>Не правильный адрес</p>");
}
?>

