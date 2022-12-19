<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../database/Database.php';
    include_once '../product/Product.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $db = new Database();
        $db = $db->connect();
        $product = new Products($db);

        $res = $product->fetchAll();
        $resCount = $res->rowCount();

        if($resCount > 0) {

            $products= array();

            while($row = $res->fetch(PDO::FETCH_ASSOC)) {

                extract($row);
                array_push($products, array( 'id' => $id, 'name' => $name, 'price' => $price, 'description' => $description));
            }
            
            echo json_encode($products);

        } else {
            echo json_encode(array('message' => "Записи не найдены"));
        }
    } else {
        echo json_encode(array('message' => "Ошибка"));
    }