<?php
addTrait("Auth");

class Auth
{

    use AuthTrait;


    public function register()
    {

        view("pages.auth.register");

    }

    public function login()
    {

        view("pages.auth.login");

    }

    public function registerPost()
    {
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $model = new User();


        if ($name === "" || $surname === "" || $age === "" || $email === "" || $password === "") {
            Route::goToRegister();
        } else {

            $insertArr = [
                "name" => $name,
                "surname" => $surname,
                "age" => $age,
                "email" => $email,
                "password" => $password,
            ];

            $id = $model->insert($insertArr);

            $auth = [
                "id" => $id,
                "name" => $name,
                "surname" => $surname,
                "age" => $age,
                "email" => $email,
            ];

            $_SESSION['auth'] = $auth;

            Route::goToProducts();

        }

    }

    public function loginPost()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $model = new User();
        $user = $model->find("`email` = '$email'");


        if (password_verify($password, $user["password"])) {
            $auth = [
                "id" => $user["id"],
                "name" => $user["name"],
                "surname" => $user["surname"],
                "age" => $user["age"],
                "email" => $email,
            ];

            $_SESSION['auth'] = $auth;
            Route::goToProducts();
        } else {
            Route::goToLogin();
        }

    }

    public function logOut()
    {

        unset($_SESSION['auth']);

        Route::goToLogin();

    }


}
