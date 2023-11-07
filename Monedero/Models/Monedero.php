<?php

namespace Models;



class Monedero {
    private $registros;

    public function __construct() {
        $this->registros = array();
        $this->cargarRegistrosDesdeXML();
    }

    public function cargarRegistrosDesdeXML() {
        if (file_exists("Files/Monedero.xml")) {
            $xml = simplexml_load_file("Files/Monedero.xml");

            foreach ($xml->registro as $registro) {
                $concepto = (string)$registro->Concepto;
                $fecha = (string)$registro->Fecha;
                $importe = (float)$registro->Importe;

                $nuevoRegistro = array(
                    'Concepto' => $concepto,
                    'Fecha' => $fecha,
                    'Importe' => $importe
                );
                $this->registros[] = $nuevoRegistro;
            }
        } else {
            echo "El archivo XML no existe: Files/Monedero.xml";
        }
    }

    public function agregarRegistro( $registro)
    {
        $this->registros[] = $registro;

        $this->actualizarXML();
    }

    public function actualizarXML()
    {
        if(file_exists("Files/Monedero.xml")){
            unlink("Files/Monedero.xml");

            //llamamos a la función subirXML que sube los datos al XML existente
            $xml = new \DOMDocument('1.0', 'UTF-8');
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            // Create the root element
            $lista_registros = $xml->createElement('Registros');
            $xml->appendChild($lista_registros);


            // Create the root element
            foreach ($this->registros as $registro){
                $registro_element = $xml->createElement('registro');
                $lista_registros->appendChild($registro_element);


                $concepto_element = $xml->createElement('Concepto', $registro['Concepto']);
                $registro_element->appendChild($concepto_element);

                $fecha_element = $xml->createElement('Fecha',  $registro['Fecha']);
                $registro_element->appendChild($fecha_element);

                $importe_element = $xml->createElement('Importe', $registro['Importe']);
                $registro_element->appendChild($importe_element);
            }

            $xml->save("Files/Monedero.xml");


            //si no existe
        } else {


            //llamamos a la función subirXML que sube los datos al XML existente
            $xml = new \DOMDocument('1.0', 'UTF-8');

            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            // Create the root element
            $lista_registros = $xml->createElement('Registros');
            $xml->appendChild($lista_registros);


            // Create the root element
            foreach ($this->registros as $registro){
                $registro_element = $xml->createElement('registro');
                $lista_registros->appendChild($registro_element);


                $concepto_element = $xml->createElement('Concepto', $registro['Concepto']);
                $registro_element->appendChild($concepto_element);

                $fecha_element = $xml->createElement('Fecha',  $registro['Fecha']);
                $registro_element->appendChild($fecha_element);

                $importe_element = $xml->createElement('Importe', $registro['Importe']);
                $registro_element->appendChild($importe_element);
            }

            $xml->save("Files/Monedero.xml");

        }



    }
    public function getRegistros() {
        return $this->registros;
    }

    public function setRegistros(array $registros): void
    {
        $this->registros = $registros;
    }

}
