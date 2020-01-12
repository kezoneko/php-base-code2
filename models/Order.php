<?php

class Order
{

    /**
     * Сохранение заказа
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            .'VALUE (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Обновление данных о заказе по $id и массиву данных $options
     */
    public static function updateOrderById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // ВЫполение запроса
        $result = $db->prepare('UPDATE product_order SET '
            .'user_name = :user_name, '
            .'user_phone = :user_phone, '
            .'user_comment = :user_comment, '
            .'date = :date, '
            .'status = :status '
            .'WHERE id = :id'
        );
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':user_name', $options['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $options['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_comment', $options['user_comment'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Получение данных о заказе по $id
     */
    public static function getOrderById($id)
    {
        // Подключение к БД
        $db = Db::getConnection();

        // Подготовка запроса к БД
        $result = $db->prepare('SELECT * FROM product_order WHERE id = :id');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде ассоциативного массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение запроса
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Получение текстового значение статуса заказа
     */
    public static function getStatusText($status)
    {
        if ($status) {
            return 'Обработан';
        } else {
            return 'Не обработан';
        }
    }

    /**
     * Получение данных всех заказов
     */
    public static function getOrdersList()
    {
        // Подключение к БД
        $db = Db::getConnection();

        // Выполнение запроса
        $result = $db->query('SELECT * FROM product_order ORDER BY date DESC')->fetchAll();
        /*$i = 0;
        $orders = array();
        foreach ($result as $order) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['user_name'] = $row['user_name'];
            $orders[$i]['user_phone'] = $orw
            $i++;
        }*/

        return $result;
    }

    /**
     * Удаление заказа по заданному $id
     */
    public static function deleteOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Выполнение запроса
        $result = $db->prepare('DELETE FROM product_order WHERE id=:id');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}
?>
