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

}
?>
