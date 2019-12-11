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
            .'ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
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
