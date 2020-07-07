<?php


namespace app\components;


use app\database\UsersTable;
use app\database\UserStatusTable;
use app\model\User;
use base\App;
use base\component\Component;

/**
 *  TODO: Вы можете изменить методы этого класса, чтобы он отвечал требованиям вашего
 *  TODO: веб-приложения.
 *
 *  TODO: Прочитайте PHPDOC к методу auth() и register(), чтобы понять, каким образом
 *  TODO: происходит авторизация и регистрация пользователя соответственно.
 */
class AuthComponent extends Component
{
    /**
     * @var UsersTable - объект таблицы для запросов к базе данных
     */
    private $usersTable;

    public function __construct()
    {
        $this->setUsersTable();
    }

    /**
     *  Реализация авторизации пользователя с помощью пары email/password.
     *
     *  Авторизация построена по принципу работы с cookie. Там будет храниться
     * auth_token - хеш-строка из email, password и time(). В базе данных у каждого
     * пользователя тоже есть такой столбец, куда после авторизации записывается
     * сгенерированный auth_token.
     *
     *  Далее в BaseController происходит проверка наличия поля 'auth_token' в
     * куках и получение нужных данных из БД в сессию с помощью метода setSession()
     * этого компонента.
     *
     * @param $email string
     * @param $password string
     * @param $remember
     *
     * @return bool
     */
    public function auth($email, $password, $remember = null)
    {
        $user = $this->getUser("email", $email);

        $hash = $this->generateHashPassword($password, $user['salt']);

        if ($hash === $user['password']) {
            $auth_token = hash("sha256", $email . $password . time());
            $this->usersTable->update(['auth_token' => $auth_token], ['email' => $email]);

            if ($remember) {
                setcookie("auth_token", $auth_token, time() + App::$session->rememberMe, '/');
            }
            else {
                setcookie("auth_token", $auth_token, time() + App::$session->life, '/');
            }

            return true;
        }
        else {
            return false;
        }
    }

    /**
     *  Реализация регистрации пользователя.
     *
     *  Для хранения пароля используется хеш-строка. Для большей безопасности
     * генерируется соль - строка с рандомным набором символов.
     *
     *  Для добавления пользователя в базу данных создаётся объект класса User.
     *
     * @param $name
     * @param $email
     * @param $password
     * @return int
     */
    public function register($name, $email, $password)
    {
        $salt = $this->generateSalt();
        $hashPassword = $this->generateHashPassword($password, $salt);

        $userStatusTable = new UserStatusTable();
        $status = $userStatusTable->get("*", ['name' => "user"])[0];

        $user = new User($name, $email, $hashPassword, $salt, $status['id']);

        return $this->usersTable->insert($user);
    }

    /**
     *  Реализация выхода авторизованного пользователя.
     *
     *  Если обновление БД прошло успешно, удаляется кука с auth_token, а также
     * сбрасываются данные о пользователе в сессии.
     *
     *  TODO: Не забудьте обновить сбрасываемые данные, исходя из Вашей реализации
     *  TODO: функции setSession()!
     */
    public function logout()
    {
        if ($this->usersTable->update(['auth_token' => ''], ['id' => App::$session->user->getId()])) {
            setcookie("auth_token", '', time() - 3600, '/');

            App::$session->user->auth = false;

            App::$session->user->setId(null);
            App::$session->user->setEmail(null);
            App::$session->user->setRole(null);

            return true;
        }

        return false;
    }

    /**
     *  Генерирует соль - строку с рандомным набором символов
     * для улучшения безопасности пароля.
     */
    private function generateSalt()
    {
        $salt = '';
        $saltLength = 45;
        for($i = 0; $i < $saltLength; $i++) {
            $rand = mt_rand(65, 90);

            if ($rand == 34 || $rand == 39)
                $i -= 1;
            else
                $salt .= chr($rand);
        }
        return $salt;
    }

    /**
     *  Генерирует хеш-строку с паролем
     *
     * @param string $password - пароль
     * @param string $salt     - соль
     * @return string
     */
    private function generateHashPassword($password, $salt)
    {
        $password512 = hash('sha512', $password);
        $salt512 = hash('sha512', $salt);

        return hash('sha512', $password512 . $salt512);
    }

    public function setSession($auth_token)
    {
        $user = $this->getUser("auth_token", $auth_token);

        $statusTable = new UserStatusTable();
        $status = $statusTable->get("*", ['id' => $user['status_id']])[0];

        App::$session->user->auth = true;
        App::$session->user->setId($user['id']);
        App::$session->user->setEmail($user['email']);
        App::$session->user->setRole($status['name']);

        return true;
    }

    private function getUser($param, $value)
    {
        $user = $this->usersTable->get("*", [$param => $value]);

        if (empty($user)) {
            return null;
        }
        else {
            /**
             *  Если массив не пустой, значит, пользователь с таким
             * email найден. Массив будет выглядеть следующим образом:
             * $user = [0 => [userData]]
             *
             *  Чтобы не мучиться с обращением $user[0]['fieldName'],
             * убираем эту вложенность. Это можно сделать, поскольку
             * найдена будет только одна строка (потому что поле email
             * уникальное).
             */
            return $user[0];
        }
    }

    private function setUsersTable()
    {
        $this->usersTable = new UsersTable();
    }
}