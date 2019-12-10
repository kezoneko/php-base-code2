<?php

class Product
{

    const SHOW_BY_DEFAULT = 10; // по умолчанию показывает 10 записей (товаров) из БД

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {

        $count = intval($count);

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
            .'WHERE status=1 '
            .'ORDER BY id DESC '
            .'LIMIT '. $count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;

    }

    /**
     * Return a row of product from id field
     */
    public static function getProductById($id)
    {

        $id = intval($id);

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM product WHERE id='. $id);
        
        $product = $result->fetch();

        return $product;
    }

}

?>
