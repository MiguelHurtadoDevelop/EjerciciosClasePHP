<?php

namespace Controllers;
use Lib\Pages;
use Utils\Utils;
use Models\Categoria;


class CategoriaController
{
    private Pages $pages;

    /**
     * @param Pages $pages
     */
    public function __construct()
    {
        $this->pages = new Pages();
    }

    public static function obtenerCategorias():?array {
        return Categoria::getAll();

    }

    public function gestionarCategoria(){

        $this->pages->render('/categoria/categoriaAdmin');

    }

    function addCategory(){
        $this->pages->render('/categoria/añadirCategoria');
    }
    public function AnadirCategoria(){

        if (($_SERVER['REQUEST_METHOD']) === 'POST'){
            if ($_POST['categoria']){
                $nombre= $_POST['categoria'];
                $categoria = new Categoria();
                $categoria->setNombre($nombre);
                $save = $categoria->create();
                if ($save){
                    $_SESSION['CategoriaAñadida'] = "complete";
                } else {
                    $_SESSION['CategoriaAñadida'] = "failed";
                }

            }else{
                $_SESSION['CategoriaAñadida'] = "failed";
            }

            $categoria->desconecta();

            $this->pages->render('/categoria/categoriaAdmin/');

        }

    }
}
