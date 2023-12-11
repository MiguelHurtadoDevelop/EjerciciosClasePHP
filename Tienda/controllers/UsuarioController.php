<?php
namespace Controllers;
use Models\User;
use Lib\Pages;
use Utils\Utils;

class UsuarioController
{
    private Pages $pages;

    /**
     * @param Pages $pages
     */
    public function __construct()
    {
        $this->pages = new Pages();
    }

    public function registro(){
        if (($_SERVER['REQUEST_METHOD']) === 'POST'){
            if ($_POST['data']){
                $registrado = $_POST['data'];

                $registrado['password'] = password_hash($registrado['password'], PASSWORD_BCRYPT, ['cost'=>4]);

                $usuario = User::fromArray($registrado);

                $save = $usuario->create();
                if ($save){
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }

            } else {
                $_SESSION['register'] = "failed";
            }
            $usuario->desconecta();
        }

        $this->pages->render('/usuario/registro');
    }

    public function login(){
        if (($_SERVER['REQUEST_METHOD']) === 'POST'){
            if ($_POST['data']){
                $login = $_POST['data'];

                $usuario = User::fromArray($login);

                $verify = $usuario->login();

                if ($verify!=false){
                    $_SESSION['login'] = $verify;
                } else {
                    $_SESSION['login'] = "failed";
                }

            } else {
                $_SESSION['login'] = "failed";
            }
        }

        $this->pages->render('/usuario/login');
    }

    public function logout(){
        Utils::deleteSession('login');

        header("Location:".BASE_URL);
    }

}