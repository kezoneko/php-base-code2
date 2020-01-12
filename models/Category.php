<?php

class Category
{

    /**
     * Returns an array of categories
     */
    public static function getCategoriesList()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category '
            .'WHERE status="1" '
            .'ORDER BY sort_order, name ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;

    }

    /**
     * Возвращает массив категорий для списка в админпанели <br>
     * (при этом в результат попадают и включенные и выключенные категории)
     * return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin()
    {

        $db = Db::getConnection();

        $categoryList = [];

        $result = $db->query('SELECT id, name, sort_order, status FROM category ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }

        return $categoryList;
    }

    /**
     * Return a name of custom category by $id
     */
    public static function getCategoryName($categoryId)
    {

        $db = Db::getConnection();
        $result = $db->query("SELECT name FROM category "
            ."WHERE id=". $categoryId);
        $categoryName = $result->fetch();

        return $categoryName['name'];

    }

    /**
     * Возвращает данные о категории по $id
     */
    public static function getCategoryById($id)
    {
        $id = intval($id);
        
        if ($id) {
            // Подключение к БД
            $db = Db::getConnection();
            // Запрос
            $result = $db->query("SELECT id, name, sort_order, status FROM category WHERE id = ". $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        }
    }

    /**
     * Возвращает понятный человеку текущий статус
     * @param integer $status <p>1 или 0</p>
     * @return string <p>Отображается или Скрыт</p>
     */
    public static function getStatusText($status)
    {
        if ($status) {
            return 'Отображается';
        } else {
            return 'Скрыт';
        }
    }

    /**
     * Создание новой категории
     * @param string $name <p>Название категории</p>
     * @param integer $sortOrder <p>Порядковый номер для сортировки</p>
     * @param integer $status <p>1 или 0 (Отображается или скрыт)</p>
     * @return boolean <p>true или false (Добавлен в БД или нет)</p>
     */
    public static function createCategory($name, $sortOrder, $status)
    {
        // Подключение к БД
        $db = Db::getConnection();

        // Подготовка запроса
        $sql = 'INSERT INTO category '
            .'(name, sort_order, status) '
            .'VALUES (:name, :sort_order, :status)';
        // Выполнение запроса по подготовленному запросу
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
    }

    /**
     * Сохранение данных категорий после изменения по $id
     */
    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        // Подключение к БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->prepare("UPDATE category "
            ."SET name = :name, sort_order = :sort_order, status = :status "
            ."WHERE id = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Удаление категории с заданным $id
     */
    public static function deleteCategoryById($id)
    {
        // Подключение к БД
        $db = Db::getConnection();

        // Выполнение запроса к БД
        $result = $db->prepare('DELETE FROM category WHERE id=:id');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

}

?>
