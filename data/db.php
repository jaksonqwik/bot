<?php
abstract class Database{
    public $connect;

    function __construct(){
        $this->connect = mysqli_connect('localhost', 'root', '', 'tg_bot');   
    }

    abstract function add();
}

?>