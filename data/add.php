<?php
class Add extends Database{

    function add(){
        $result = mysqli_query($this->connect, "INSERT INTO `users`(`id`, `name`, `username`) VALUES (NULL,'',''");
        return mysqli_fetch_all($result);
    }
}

?>