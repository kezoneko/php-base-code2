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
     * @return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name, sort_order, status FROM category '
            .'ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
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

}

?>
