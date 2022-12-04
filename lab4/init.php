<?php
$products = array(
        array(
            'id'=>1,
            'name'=> 'Iphone',
            'price'=>  100000,
            'description'=>'apple phone'
        ),
        array(
            'id'=>2,
            'name'=> 'Sony ps4',
            'price'=>  100001,
            'description'=>'console'
        ),
        array(
            'id'=>3,
            'name'=> 'xiaomi',
            'price'=>  11,
            'description'=>'mobile phone from china'
        ),
    );
$xml =new DOMDocument('1.0','UTF-8');

$root = $xml->createElement('products');
$xml->appendChild($root);

foreach ($products as $value ){
    $product = $xml->createElement('product');
    foreach ($value as $key=>$value){
        $node = $xml->createElement($key,$value);
        $product->appendChild($node);
    }
    $root->appendChild($product);

}
$xml->formatOutput = true;
$xml->save('files/data.xml')or die('Error');


