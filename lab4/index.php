<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Solopov Artem lab4</title>
</head>
<body>
<?php
    if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
            case 'list':
                require_once 'product/list.php';
                break;
            case 'create':
                require_once 'product/create.php';
                break;
            case 'update':
                require_once 'product/update.php';
                break;
            case 'delete':
                require_once 'product/delete.php';
                break;
        }
    }else{
        require_once 'product/list.php';
    }
?>
</body>
</html>
