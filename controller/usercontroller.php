<?php
require_once('../model/userModel.php');

class usercontroller
{

    public function Register()
    {
        $error = ""; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $user = new UserModel();
            $role = 'auteur';
            $user->setnom($_POST['nom']);
            $user->setprenom($_POST['prenom']);
            $user->setemail($_POST['email']);
            $user->setpass($_POST['pass']);
            // $user->settel($_POST['tel']);
            $user->setrole($role);
            $error = $user->register(); 

            if (empty($error)) {
                header('Location: ../view/loginview.php');
                exit();
            }

            return $error;

        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pass']) && isset($_POST['email'])) {
            $user = new UserModel();
            $user->setemail($_POST['email']);
            $user->setpass($_POST['pass']);
            $authenticatedUser = $user->login();

            if ($authenticatedUser) {
                session_start();
                $_SESSION['iduser'] = $authenticatedUser['iduser'];
                $_SESSION['nom'] = $authenticatedUser['nom'];
                $_SESSION['role'] = $authenticatedUser['role'];
                

                if ($_SESSION['role'] === 'admin') {
                    header('Location: ../view/dashboardview.php');
                    exit();
                } elseif ($_SESSION['role'] === ':auteur') {
                    header('Location: ../view/index.php');
                    exit();
                }
            } else {
                return "Donées invalides.";
            }
        }
    }
    public function logout(){
        if(isset($_POST['logout'])){
            session_destroy();
            header("Location: ../view/loginview.php");
            exit();
        }
       
        }
    
        

        public function isLoggedIn($requiredRole = null)
        {
            session_start();
    
            if (!isset($_SESSION['iduser'])) {
                header("Location: loginview.php");
                exit();
            }
    
            if ($requiredRole !== null && $_SESSION['role'] !== $requiredRole) {
                header('Location: loginview.php');
                exit();
            }
        }
        public function checkRoleAdmin()
        {
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                return true;
            }
        }
        public function checkRoleAuteur()
        {
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'auteur') {
                return true;
            }
        }
    
    





   public function statuser(){

    $userModel = new UserModel();
    return $userStatistics = $userModel->getUserStatistics();
   }



}