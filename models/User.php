<?php

class User
{

    public static function register($name, $email, $password)
    {
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
            .'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Редактирование данных пользователя
     * @param integer $id
     * @param string $name
     * @param string $password
     */
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user
            SET name = :name, password = :password
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет пароль: не меньше, чем 6 символа
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет адрес электронной почты
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет существует ли введенный пользователем при
     * регистрации адрес электронной почты или нет
     */
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email=:email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Проверяет существует ли пользователь с заданными $email и $password
     * @param string $email
     * @param string $password
     * @return mixed : integer user id or false 
     */
    public static function checkUserData($email, $password)
    {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    public static function checkPhone($userPhone)
    {
        if ($userPhone > 10) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Запоминаем пользователя
     * @param string $email
     * @param string $password
     */
    public static function auth($userId)
    {
        
        $_SESSION['user'] = $userId;
    }

    /**
     * Проверка залогинен ли пользователь
     */
    public static function checkLogged()
    {

        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Проверка является ли пользователь гостем или авторизированным пользователем
     */
    public static function isGuest()
    {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function isAdmin()
    {
        if (isset($_SESSION['user'])) {
            $user = self::getUserById($_SESSION['user']);
            if ($user['role'] == 'admin') {
                return true;
            }
            return false;
        }
        return false;
    }

    /**
     * Получение пользователя из БД по идентификатору
     * @param integer $id
     */
    public static function getUserById($id)
    {

        if ($id) {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

    /**
     * Получение имени пользователя по ID
     */
    public static function getUserNameById($id)
    {
        if ($id) {
            $db = Db::getConnection();

            $result = $db->prepare('SELECT name FROM user WHERE id = :id');
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();
            $row = $result->fetch();
            return $row['name'];
        }
    }
}
?>
