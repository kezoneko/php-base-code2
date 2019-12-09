<?php
class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * Returns request string
     * @return string
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // echo '<br>Где ищем (запрос, к-ый набрал пользователь): '. $uri;
                // echo '<br>Что ищем (совпадение из правила): '. $uriPattern;
                // echo '<br>Кто обрабатывает: '. $path;

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                // echo '<br><br>Нужно сформировать: '. $internalRoute;

                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                array_shift($segments); // удаление первого элемента массива

                $controllerName = array_shift($segments) .'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

                // $result = $controllerObject->$actionName($parameters);
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
            //echo '<br>'.$uri;
        }

        // Если есть совпадение, определить какой контроллер
        // и action обрабатывают запрос

        // Подключить файл класса-контроллера

        // Создать объект, вызвать метод (т.е. action)
    }
}
?>
