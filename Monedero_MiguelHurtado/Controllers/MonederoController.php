<?php

    namespace Controllers;


    use Models\Monedero;
    use Lib\Pages;


    class MonederoController{

        /**
         * @var Monedero
         * Variable monedero del tipo Moneder
         */
        private Monedero $monedero;
        /**
         * @var
         * Variable del tipo Pagess
         */
        private Pages $pages;

        /**
         *Instanciamos dos objetos, uno de la clase Monedero y otro de la clase Pages
         */
        public function __construct(){
            $this->monedero = new Monedero();
            $this->pages = new Pages();
            
        }


        /**
         * @return void
         * Metodo que obtiene mediante GET el indice del registro y lo borra, despues nos manda a la pagina principal
         */
        public function borrarRegistro():void {
            if (isset($_GET['indice'])) {
                $indiceABorrar = $_GET['indice'];

                $registros = $this->monedero->getRegistros();


                $registrosActualizados = array_filter($registros, function ($registro) use ($indiceABorrar) {
                    return $registro['Indice'] !== $indiceABorrar;
                });

                $this->monedero->setRegistros(array_values($registrosActualizados));
                $this->monedero->actualizarXML();
            }

            header("Location:".URL_DEFAULT);
        }

        /**
         * @return void
         * Metodo que obtiene mediante GET el $concepto, $fecha e $importe del nuevo registro y lo añade, despues nos
         * manda a la pagina principal
         */
        public function añadirRegistro():void {
            $concepto=$_GET['concepto'];
            $fecha=$_GET['fecha'];
            $importe=$_GET['cantidad'];
            $nuevoRegistro = array(
                'Concepto' => $concepto,
                'Fecha' => $fecha,
                'Importe' => $importe
            );
            $this->monedero->agregarRegistro($nuevoRegistro);
            header("Location:".URL_DEFAULT);
        }

        /**
         * @return void
         * Metodo que obtiene mediante GET el $concepto, $fecha , $importe Editados y el indice del Registro a
         * editar y lo edita, despues nos manda a la pagina principal
         */
        public function editarRegistro():void {

            $concepto=$_GET['concepto'];
            $fecha=$_GET['fecha'];
            $importe=$_GET['cantidad'];
            $indice=$_GET['indice'];

            $nuevoRegistro = array(
                'Concepto' => $concepto,
                'Fecha' => $fecha,
                'Importe' => $importe
            );

            $this->monedero->updateRegistro($indice, $nuevoRegistro);

            header("Location:".URL_DEFAULT);

        }


        /**
         * @return void
         * Metodo que obtiene mediante GET el concepto a buscar y lo busca entre los registros, , despues nos manda
         * a la pagina principal pasandole solo los registros encontrados
         */
        public function buscarRegistro():void {
            $registroABuscar = $_GET['conceptoBuscar'];
            $registroBuscado = $this->monedero->buscarRegistro($registroABuscar);

            $this->pages->render('Views/mostrarMonedero', ['monedero' =>$registroBuscado]);
        }

        /**
         * @return void
         * Metodo que nos ordena por concepto los registros, despues nos manda a la pagina principal
         */
        public function ordernarPorConcepto():void {
                $registros = $this->monedero->getRegistros();

                usort($registros, function($a, $b) {
                    return strcmp($a['Concepto'], $b['Concepto']);
                });


                $this->monedero->ordenarRegistros($registros);

            header("Location:".URL_DEFAULT);
        }

        /**
         * @return void
         * Metodo que nos ordena por fecha los registros, despues nos manda a la pagina principal
         */
        public function ordernarPorFecha():void {
            $registros = $this->monedero->getRegistros();

            usort($registros, function ($a, $b) {
                $fechaA = \DateTime::createFromFormat('d/m/Y', $a['Fecha']);
                $fechaB = \DateTime::createFromFormat('d/m/Y', $b['Fecha']);
        
                // Compara las fechas
                return $fechaA <=> $fechaB;
            });
        
            $this->monedero->ordenarRegistros($registros);
            header("Location:".URL_DEFAULT);
        }

        /**
         * @return void
         * Metodo que nos ordena por Importe los registros, despues nos manda a la pagina principal
         */
        public function ordernarPorImporte():void {
            $registros = $this->monedero->getRegistros();
        
            usort($registros, function($a, $b) {
                return $a['Importe'] <=> $b['Importe'];
            });
        
            $this->monedero->ordenarRegistros($registros);
            header("Location:".URL_DEFAULT);
        }


        /**
         * @param Monedero|null $monedero
         * @return void
         * Metodo que nos manda a la vista mostrarMonedero pasandole los registros de $monedero
         */
        public function MostrarMonedero(Monedero $monedero = null):void {

            if($monedero == null){
                $monedero = $this->monedero;
            }

            $this->pages->render('Views/mostrarMonedero', ['monedero' => $monedero->getRegistros()]);

        }


    }

