<?php

class Cart
{

    public static function addProduct($id)
    {
        
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            // То заполняем наш массив товарами
            $productsInCart = $_SESSION['products'];
        }

        // Если товер есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;
        // prePrint($_SESSION['products']); die();
        return self::countItems();
    }

    public static function deleteProduct($id)
    {

        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = array();

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        // Если товар есть в корзине, но была нажата кнопка удаления, удаляем из сессии и уменьшаем количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]--;
        }
        if ($productsInCart[$id] == 0) {
            unset($productsInCart[$id]);
        }

        $_SESSION['products'] = $productsInCart;
        return self::countItems();
    }

    public static function countItems()
    {

        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        } else {
            return false;
        }
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();
        $total = 0;
        
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
}
?>
