<?php

namespace src\controllers;
use src\Lib\Pages;
use src\models\Producto;


class ProductoController
{
    private Pages $pages;

    /**
     * @param Pages $pages
     */
    public function __construct()
    {
        $this->pages = new Pages();
    }

    public static function obtenerProductos():?array {
        return Producto::getAll();

    }

    public function gestionarProducto(){

        $this->pages->render('/producto/productoAdmin');

    }

    function addProduct(){
        $this->pages->render('/producto/añadirProducto');
    }
    public function AnadirProducto(){

        if (($_SERVER['REQUEST_METHOD']) === 'POST'){
            if ($_POST['producto']){
                $producto= $_POST['producto'];

                $nombre = $producto['nombre'];
                $descripcion = $producto['descripcion'];
                $precio = $producto['precio'];
                $categoriaId = $producto['categoria'];
                $stock = $producto['stock'];
                $imagen = "hola";
                $fecha = date("D-M-Y");
                $oferta = "0";

                $productoNuevo = new Producto();

                $productoNuevo->setNombre($nombre);
                $productoNuevo->setDescripcion($descripcion);
                $productoNuevo->setPrecio($precio);
                $productoNuevo->setCategoriaId($categoriaId);
                $productoNuevo->setStock($stock);
                $productoNuevo->setFecha($fecha);
                $productoNuevo->setImagen($imagen);
                $productoNuevo->setOferta($oferta);

                $save = $productoNuevo->create();

                if ($save) {
                    $_SESSION['ProductoAñadido'] = "complete";
                } else {
                    $_SESSION['ProductoAñadido'] = "failed";
                }

            } else {
                $_SESSION['ProductoAñadido'] = "failed";
            }

            $productoNuevo->desconecta();



        }
        $this->pages->render('/producto/productoAdmin');

    }

    public function borrarProducto(){

        if (isset($_GET['id'])) {

            $idProducto = $_GET['id'];

            $productoABorrar = new Producto();

            $productoABorrar->setId($idProducto);

            $delete = $productoABorrar->delete();

            if ($delete) {
                $_SESSION['ProductoBorrado'] = "complete";
            } else {
                $_SESSION['ProductoBorrado'] = "failed";
            }

            $productoABorrar->desconecta();



        } else {
            $_SESSION['ProductoBorrado'] = "failed";
        }
        $this->pages->render('/producto/productoAdmin');
    }

}
