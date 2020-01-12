<?php

/**
 * Контроллер для заказов
 */
class AdminOrderController extends AdminBase
{

    /**
     * Action для страницы "Список заказов"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получение данных всех заказов
        $orders = Order::getOrdersList();

        // Подключение отображения
        require_once ROOT .'/views/admin_order/index.php';
        return true;
    }

    /**
     * Action для страницы "Просмотр заказа"
     */
    public function actionView($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с идентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);

        // Подключаем отображение
        require_once ROOT .'/views/admin_order/view.php';
        return true;
    }

    /**
     * Action для страницы "Редактировать заказ"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        $order = Order::getOrderById($id);

        // Флаг ошибки
        $errors = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. Можно валидировать данные
            $options['user_name'] = $_POST['user_name'];
            $options['user_phone'] = $_POST['user_phone'];
            $options['user_comment'] = $_POST['user_comment'];
            $options['date'] = $_POST['date'];
            $options['status'] = $_POST['status'];

            // Сохраняем изменения
            Order::updateOrderById($id, $options);

            // Перенаправляем пользователя на страницу управления заказами
            header("Location: /admin/order");
        }

        // Подключение отображения
        require_once ROOT .'/views/admin_order/update.php';
        return true;
    }

    /**
     * Action для страницы "Удалить заказ"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);

            // Перенаправляем пользователя на страницу управления заказами
            header("Location: /admin/order");
        }

        // Подключение отображения
        require_once ROOT .'/views/admin_order/delete.php';
        return true;
    }
}
?>
