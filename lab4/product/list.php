<?php
$dom = new DOMDocument();
$dom->load('files/data.xml');
$products = $dom->getElementsByTagName('products')->item(0);
?>
<style>
    body{
        background: #1d8ea6;
        position: relative;
        left: 100px;
    }
    th{
        padding-right: 200px;
    }
    .container-fuild{
        font-size: 25px;
        font-family: "Comic Sans MS";
        color: white;

    }
    th{
        border: solid  black;
        color:white;
    }
    td{
        border: solid  black;
    }
    a .btn btn-primary{
        border: solid  black;
    }
    .shop-name{
        text-align: center;
        position: relative;
        right: 100px;
    }
    #button{
        position: relative;
        left: 1700px;
        border: solid black;
        border-radius: 10px;
        font-size: 30px;
        font-family: "Comic Sans MS";
        color: white;
        background: black;
    }

</style>
<body>
<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Список Товаров</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                $product=$products->getElementsByTagName('product');
                while (is_object($product->item($i++))){
                    ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('price')->item(0)->nodeValue?></td>
                    <td><?php echo $product->item($i-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>
                    <td><a href="index.php?page_layout=update&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> Изменить <?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?></a></td>
                    <td><a onclick="return Del('<?php echo $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue;?>//')"  href= "index.php?page_layout=delete&id=<?php echo  $product->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Удалить </a></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" id="button" href="index.php?page_layout=create">Add</a>
            <h1 class="shop-name">LAB4 SHOP</h1>
        </div>
    </div>
</div>
</body>
<script>
    function Del(name){
        return confirm("Удалить  "+name+" ?");
    }
</script>