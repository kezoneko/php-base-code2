<?php

include_once ROOT .'/models/Category.php'; // подключение модели для Категорий товаров
include_once ROOT .'/models/Product.php'; // подключение модели для товаров

class SiteController
{

    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        require_once(ROOT .'/views/site/index.php');

        return true;

    }

}

?>
