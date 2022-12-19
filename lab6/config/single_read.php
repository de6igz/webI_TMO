<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../database/Database.php';
    include_once '../product/Product.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $db = new Database();
        $db = $db->connect();

        $product = new Products($db);

        $data = json_decode(file_get_contents("php://input"));

        if(isset($data->id)) {
            $product->id = $data->id;

            if($product->fetchOne()) {

                print_r(json_encode(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description
                )));

            } else {
                echo json_encode(array('message' => "Записи не найдены"));
            }

        } else {
            echo json_encode(array('message' => "Ошибка: ID продукта не найден"));
        }
    } else {
        echo json_encode(array('message' => "Ошибка"));
    }