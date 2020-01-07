<?php
return array(
    // Товары
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    // Категория
    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
    // Корзина
    'cart/checkout' => 'cart/checkout', // actionCheckout в CartController
    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
    'cart' => 'cart/index', // actionIndex в CartController
    // Пользователь
    'user/register' => 'user/register', // actionRegister в UserController
    'user/login' => 'user/login', // actionLogin в UserController
    'user/logout' => 'user/logout', // actionLogout в UserController
    'cabinet/edit' => 'cabinet/edit', // actionEdit в CabinetController
    'cabinet' => 'cabinet/index', // actionIndex в CabinetController
    // Админпанель
    'admin' => 'admin/index',
    // О магазине
    'contacts' => 'site/contact', // actionContact в SiteController
    //'about' => 'site/about',
    // Главная страница
    '' => 'site/index', // actionIndex в SiteController
);
?>
