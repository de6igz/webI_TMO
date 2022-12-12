<?php
    $connect = mysqli_connect('localhost', 'root', '', 'itmo_lab5');
    if ($connect){
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }else{
        echo 'fail';
    }

?>