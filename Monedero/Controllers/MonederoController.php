<?php

    namespace Controllers;

    use Models\Monedero;
    use Lib\Pages;
    use Models\Registro;

    class MonederoController{
        private Monedero $monedero;
        private Pages $pages;

        public function __construct(){
            $this->monedero = new Monedero();
            $this->pages = new Pages();
        }
        public function guardarEdicion() {
            if (isset($_GET['concepto'])  && isset($_GET['nuevaFecha']) && isset($_GET['nuevoImporte'])) {
                $concepto = $_GET['concepto'];

                $nuevaFecha = $_GET['nuevaFecha'];
                $nuevoImporte = $_GET['nuevoImporte'];

                $registros = $this->monedero->getRegistros();

                // Busca el registro que coincide con el concepto en la lista de registros
                foreach ($registros as &$registro) {
                    if ($registro['Concepto'] === $concepto) {
                        // Actualiza los valores del registro
                        $registro['Concepto'] = $concepto;
                        $registro['Fecha'] = $nuevaFecha;
                        $registro['Importe'] = $nuevoImporte;

                    }
                }

                $this->monedero->setRegistros($registros);
                $this->monedero->actualizarXML();

                $this->MostrarMonedero();
            } else {
                // Manejo de errores si los campos no están definidos o faltan datos.
                echo "Error: Faltan datos necesarios para guardar la edición.";
            }
        }
        public function borrarRegistro() {
            if (isset($_GET['concepto'])) {
                $conceptoABorrar = $_GET['concepto'];

                $registros = $this->monedero->getRegistros();

                // Recorremos los registros y eliminamos los que coinciden con el concepto
                $registrosActualizados = array_filter($registros, function ($registro) use ($conceptoABorrar) {
                    return $registro['Concepto'] !== $conceptoABorrar;
                });

                $this->monedero->setRegistros(array_values($registrosActualizados));
                $this->monedero->actualizarXML();
            }

            $this->MostrarMonedero();
        }
        public function añadirRegistro(){

            $concepto=$_GET['concepto'];
            $fecha=$_GET['fecha'];
            $importe=$_GET['cantidad'];
            $nuevoRegistro = array(
                'Concepto' => $concepto,
                'Fecha' => $fecha,
                'Importe' => $importe
            );
            $this->monedero->agregarRegistro($nuevoRegistro);


            $this->MostrarMonedero();
        }

        public function MostrarMonedero(Monedero $monedero = null){

            if($monedero == null){
                $monedero = $this->monedero;
            }


            $this->pages->render('Views/mostrarMonedero', ['monedero' => $monedero->getRegistros()]);


        }

    }
