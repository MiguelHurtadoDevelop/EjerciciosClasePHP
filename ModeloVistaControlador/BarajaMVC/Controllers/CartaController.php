<?php

namespace Controllers;

use Models\Carta;
use Lib\Pages;
class CartaController
{
    private Carta $carta;
    private Pages $pages;


    public function __construct(){

        $this->pages = new Pages();
    }
    public function formulario(){
        $this->pages->render('baraja/formulario');
    }
    public function mostrarCarta(){
        $this->pages->render('baraja/muestraCarta');
    }
}