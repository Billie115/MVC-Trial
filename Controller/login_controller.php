<?php

require_once __DIR__ . "/../Model/login_model.php";

class loginController{
    
    public function loginHandler(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $model = new loginModel();
            $loginSuccessful = $model->checkLogIn($username, $password);

            if($loginSuccessful){
                session_start();
                $_SESSION['user'] = $username;
                header("Location: http://localhost/mvc%20trial/MVC-Trial/View/mainPage_view.php");
                exit();
            }
            else{
                echo "egine mlkia bro, la8os onoma h kwdiko";
            }
        }

        $controller = new loginController();
        $controller->loginHandler();

    }
}