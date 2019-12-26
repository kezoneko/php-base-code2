<?php

class UserController
{

    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Имя пользователя не должно быть короче 2 символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Электронный адрес некорректный';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            if (!User::checkEmailExists($email)) {
                $errors[] = 'Такой адрес электронной почты ['. $email .'] уже используется';
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
            
        }

        require_once(ROOT .'/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный адрес электронной почты';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не менее 6 символов';
            }

            // Проверяем, существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == False) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /cabinet/");
            }
        }

        require_once ROOT .'/views/user/login.php';

        return true;
    }

    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        
        unset($_SESSION['user']);
        header("Location: /");
    }

}
?>
