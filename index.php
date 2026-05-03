<?php
include_once "controllers/MuridController.php";
$controller = new MuridController();

if(isset($_GET['hapus'])) {
    $controller->model->delete($_GET['hapus']);
    header("Location: index.php");
}

include_once "views/list.php";
?>