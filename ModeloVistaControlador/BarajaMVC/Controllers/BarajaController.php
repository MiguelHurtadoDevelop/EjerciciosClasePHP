<?php
    namespace Controllers;

    use Models\Barajases;
    use src\Lib\Pages;

    class BarajaController{
        private Barajases $baraja;
        private Pages $pages;

        public function __construct(){
            $this->baraja = new Barajases();
            $this->pages = new Pages();
        }
    public function barajarYMostrar(Barajases $mazo = null){

        if($mazo == null){
            $mazo = $this->baraja;
        }

        $mazo->barajar($mazo);
        $this->mostrarBaraja($mazo);

    }
        public function mostrarBaraja(Barajases $mazo = null):void{
                if($mazo == null){
                    $mazo = $this->baraja;

                }

                $this->pages->render('baraja/muestraBaraja',['mazo'=>$mazo->getBaraja()]);
        }
    }