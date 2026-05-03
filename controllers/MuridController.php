<?php
include_once dirname(__DIR__) . "/config/Database.php";
include_once dirname(__DIR__) . "/models/Murid.php";

class MuridController {
    public $model;

    public function __construct() {
        $database = new Database();
        $db = $database->connect();
        $this->model = new Murid($db);
    }
}
?>
