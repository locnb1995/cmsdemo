<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 04-Apr-18
 * Time: 4:22 PM
 */
class LoginController{

    public function checkAuth(){
        require_once ('../modèles/Login.php');
        $user = new Login();
        $info = $user->getUser();
        $check = 0;
        $username = $_POST['username'];
        $password = $_POST['password'];
        foreach ($info as $item){
            if($item['username'] == $username && $item['password'] == $password){
                header("Location: ../vues/Manager.php");
            } else {
                header("Location: ../index.php");
            }
        }

    }

}
$loginc = new LoginController();
$loginc->checkAuth();