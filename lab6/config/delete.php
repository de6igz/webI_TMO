<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');

    include_once '../database/Database.php';
    include_once '../product/Product.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$db = new Database();
		$db = $db->connect();

		$product = new Products($db);

		$data = json_decode(file_get_contents("php://input"));

		$product->id = isset($data->id) ? $data->id : NULL;

		if(! is_null($product->id)) {
	
			if($product->delete()) {
			echo json_encode(array('message' => 'Товар удален'));
			} else {
			echo json_encode(array('message' => 'Продукт не удален, попробуй еще раз'));
			}
		} else {
		echo json_encode(array('message' => "Ошибка, ID продукта не найден"));
		}
	} else {
		echo json_encode(array('message' => "Ошибка"));
	}