<?php

namespace Models;


/**
 * Clase Monedero, que contiene un array de registros y diferentes metodos para trabajar con el array
 */
class Monedero {
    /**
     * @var array
     * Variable que contiene todos los registros
     */
    private $registros;

    /**
     *En el constructor declaramos que $registros es un array y accionamos el metodo cargarRegistrosDesdeXML()
     */
    public function __construct() {
        $this->registros = array();
        $this->cargarRegistrosDesdeXML();
        ;
    }

    /**
     * @return void
     * Metodo que nos carga el XML donde tenemos guardados los registros y no los va introduciendo en el array registros
     */
    public function cargarRegistrosDesdeXML() {
        if (file_exists("Files/Monedero.xml")) {
            $xml = simplexml_load_file("Files/Monedero.xml");

            $this->registros = array();
            

            foreach ($xml->registro as $registro) {
                    $indice = (string)$registro->Indice;
                    $concepto = (string)$registro->Concepto;
                    $fecha = (string)$registro->Fecha;
                    $importe = (float)$registro->Importe;

                    $nuevoRegistro = array(
                        'Indice' => $indice,
                        'Concepto' => $concepto,
                        'Fecha' => $fecha,
                        'Importe' => $importe
                    );


                $this->registros[] = $nuevoRegistro;

            }

        }
    }

    /**
     * @param $registro
     * @return void
     * Metodo que introduce un nuevo $registro dado en el array registros y actualiza el XML
     */
    public function agregarRegistro($registro)
    {
        
        $this->registros[] = $registro;

        $this->actualizarXML();
    }

    /**
     * @param $indice
     * @param $nuevoRegistro
     * @return void
     * Metodo que actualiza un $registro con un $indice dado y actualiza el XML
     */
    public function updateRegistro($indice, $nuevoRegistro) {

        // Verifica si el índice existe en el array
        if (isset($this->registros[$indice])) {
            // Actualiza el registro
            $this->registros[$indice] = $nuevoRegistro;
            $this->actualizarXML();
        }
    }

    /**
     * @param $registroABuscar
     * @return array
     * Metodo que busca en el array un $registro por un Concepto dado llamado $registroABuscar y nos devuelve los
     * registros que coincidan
     */
    public function buscarRegistro($registroABuscar){
        $resultados = array_filter($this->registros, function ($registro) use ($registroABuscar) {
            // Comprueba si el término de búsqueda está en el concepto del registro
            return strpos($registro['Concepto'], $registroABuscar) !== false;
        });

        // Devuelve los registros que coinciden
        return $resultados;
    }

    /**
     * @return void
     * @throws \DOMException
     * Metodo que nos Actualiza el XML, si existe el fichero, lo borramos y lo creamos de nuevo con los nuevos registros
     * del array y si no existe lo crea directamente
     */
    public function actualizarXML()
    {
        //Comprobamos si existe el xml
        if(file_exists("Files/Monedero.xml")){

            //Borramos el xml
            unlink("Files/Monedero.xml");

            // Creamos los elemetos
            $xml = new \DOMDocument('1.0', 'UTF-8');
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;


            $lista_registros = $xml->createElement('Registros');
            $xml->appendChild($lista_registros);


            foreach ($this->registros as $key => $registro){
                $registro_element = $xml->createElement('registro');
                $lista_registros->appendChild($registro_element);

                $indice_element = $xml->createElement('Indice', $key);
                $registro_element->appendChild($indice_element);

                $concepto_element = $xml->createElement('Concepto', $registro['Concepto']);
                $registro_element->appendChild($concepto_element);

                $fecha_element = $xml->createElement('Fecha',  $registro['Fecha']);
                $registro_element->appendChild($fecha_element);

                $importe_element = $xml->createElement('Importe', $registro['Importe']);
                $registro_element->appendChild($importe_element);
            }

            //Guardamos  el xml
            $xml->save("Files/Monedero.xml");

            //si no existe
        } else {


            // Creamos los elemetos

            $xml = new \DOMDocument('1.0', 'UTF-8');

            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            // Create the root element
            $lista_registros = $xml->createElement('Registros');
            $xml->appendChild($lista_registros);



            foreach ($this->registros as $key=> $registro){
                $registro_element = $xml->createElement('registro');
                $lista_registros->appendChild($registro_element);

                $indice_element = $xml->createElement('Indice', $key);
                $registro_element->appendChild($indice_element);

                $concepto_element = $xml->createElement('Concepto', $registro['Concepto']);
                $registro_element->appendChild($concepto_element);

                $fecha_element = $xml->createElement('Fecha',  $registro['Fecha']);
                $registro_element->appendChild($fecha_element);

                $importe_element = $xml->createElement('Importe', $registro['Importe']);
                $registro_element->appendChild($importe_element);
            }

            //Guardamos el xml
            $xml->save("Files/Monedero.xml");

        }

    }

    /**
     * @param $registrosOrdenados
     * @return void
     * @throws \DOMException
     * Metodo que actualiza el array Registros, por un array dado $registrosOrdenados, que trae el array ordenado
     */
    function ordenarRegistros($registrosOrdenados) {
        $this->registros = $registrosOrdenados;
        $this->actualizarXML();

    }

    /**
     * @return array
     * Metodo para obtener los registros
     */
    public function getRegistros() {
        return $this->registros;

    }

    public function setRegistros(array $registros): void
    {
        $this->registros = $registros;
    }



}
