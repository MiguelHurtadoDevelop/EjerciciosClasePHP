<?php

//Programa que crea un archivo PDF a partir de un archivo XML

    //Comprobamos que existe el fichero XML
    if (file_exists('viviendas.xml')) {
        // Cargamos el XML
        $xml = simplexml_load_file('viviendas.xml');

        //Comprobamos que el XML tenga contenido
        if ($xml === false) {
            echo "ERROR: No se han podido leer los datos.";
        } else {

            //Si tiene contenido, creamos un array $viviendas con los datos de todas las viviendas del XML
            $viviendas = [];

            foreach ($xml->vivienda as $vivienda) {
                $datosVivienda = [
                    'direccion' => (string)$vivienda->direccion,
                    'precio' => (float)$vivienda->precio,
                    'beneficio' => (float)$vivienda->beneficio
                ];

                $viviendas[] = $datosVivienda;
            }

            //Llamamos a la clase fpdf
            require('fpdf/fpdf.php');

            //Creamos la clase PDF en la cual utilizaremos los metodos de FPDF
            class PDF extends FPDF
        {

                //Función que nos configura el header del pdf.
                function Header()
            {
                $this->Image('img/logo.png',-1,-1,85);
                $this->Image('img/escudo.jpg',170,15,25);


                $this->SetFont('Courier', 'B', 30);
                $this->SetY(45);
                $this->SetX(40);
                $this->Cell(0,5,("LISTA DE"),0,1,"C");
                $this->SetY(55);
                $this->SetX(40);
                $this->Cell(0,5,("BENEFICIOS"),0,0,"C");
                $this->Ln(30);

            }

                //Función que nos configura el Footer del pdf.
            function Footer()
            {
                $this->SetFont('helvetica', 'B', 8);
                $this->SetY(-15);
                $this->Cell(95,5,('Página ').$this->PageNo().' / {nb}',0,0,'L');
                $this->Cell(95,5,date('d/m/Y | g:i:a') ,00,1,'R');
                $this->Line(10,287,200,287);
                $this->Cell(0,5,("IES Francisco Ayala. Todos los derechos reservados."),0,0,"C");

            }


        }


        //Instanciamos un nuevo objeto $pdf de la clase PDF
        $pdf = new PDF();
        //Incicializamos el total de paginas del pdf
        $pdf->AliasNbPages();
        //Añadimos una pagina nueva
        $pdf->AddPage();
        //configuramos el salto automatico de paginas para que si una pagina se rellena, nos cree otra automaticamente
        $pdf->SetAutoPageBreak(true, 20);
        //Configuramos los margenes del documento
        $pdf->SetTopMargin(500);
        $pdf->SetLeftMargin(10);
        $pdf->SetRightMargin(10);
        //Establecemos la posición del puntero x
        $pdf->SetX(50);
        //Establecemos el color de relleno de las celdas en rojo
        $pdf->SetFillColor(210,57,57);
        //Establecemos el color negro para los bordes de las celdas
        $pdf->SetDrawColor(0, 0, 0);
        //Establecemos la fuente el estilo y el tamaño de las letras de la tabla
        $pdf->SetFont('Arial','B',10);

        //Creamos las celdas principales de la tabla
        $pdf->Cell(70, 12, ('Direccion'), 1, 0, 'C',1);
        $pdf->Cell(30, 12, ('Precio'), 1, 0, 'C',1);
        $pdf->Cell(30, 12, ('Beneficio'), 1, 1, 'C',1);


        
        // Establecemos los colores y las fuentes para el resto de las celdas
        $pdf->SetFillColor(255,255,255);
        $pdf->SetDrawColor(0,0,0);
        $pdf->SetFont('Arial','',10);
        //Creamos nuevas celdas con los datos de todas las $viviendas
        foreach ($viviendas as $vivienda) {
            $pdf->SetX(50);
            $pdf->Cell(70, 10, $vivienda['direccion'], 1, 0, 'C', 1);
            $pdf->Cell(30, 10, $vivienda['precio'], 1,0, 'C', 1);
            $pdf->Cell(30, 10, $vivienda['beneficio'], 1,0, 'C', 1);
            $pdf->Ln();
        }

        //Creamos el PDF
        $pdf->Output();
    }
}
