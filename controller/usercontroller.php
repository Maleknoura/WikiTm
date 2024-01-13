<?php
require_once('../model/userModel.php');

class usercontroller
{

    public function Register()
    {
        $error = ""; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $user = new UserModel();
            $role = 'membre';
            $user->setnom($_POST['nom']);
            $user->setprenom($_POST['prenom']);
            $user->setemail($_POST['email']);
            $user->setpass($_POST['pass']);
            $user->settel($_POST['tel']);
            $user->setrole($role);
            $error = $user->register(); 

            if (empty($error)) {
                header('Location: ../view/indexview.php');
                exit();
            }

            return $error;

        }
    }
    public function login()
    {
        if (isset($_POST['submit']) && isset($_POST['pass']) && isset($_POST['email'])) {
            $user = new UserModel();
            $user->setemail($_POST['email']);
            $user->setpass($_POST['pass']);
            if($user->login()){
                header("Location: ../view/dashboardview.php");
                exit();
            }else{
                return "Email or password incorrect";
            }
            
        }
    }
    
    public function logout(){
        session_destroy();
        header("Location: ../view/loginview.php");
        exit();
        }
    

    public function isLoggedIn()
    {
        session_start();

        if (!isset($_SESSION['iduser'])) {
            header("Location: loginview.php");
            exit();
        }
    }
   public function statuser(){

    $userModel = new UserModel();
    return $userStatistics = $userModel->getUserStatistics();
   }



}