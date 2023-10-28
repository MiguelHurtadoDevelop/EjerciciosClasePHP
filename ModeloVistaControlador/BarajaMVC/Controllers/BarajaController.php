<?php
    namespace Controllers;
    use Models\Barajases;
    class BarajaController{
        public function mostrarBaraja(){
            $baraja = new Barajases();
            require_once './Views/baraja/muestraBaraja.php';
        }
    }