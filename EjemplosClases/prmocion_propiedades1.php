<?php

    class Usuario{
        public function __construct(private string $nombre,
                                    private string $apellidos1,
                                    private string $apellidos2,
                                    private string $correo){
        }

    }

    $usuario = new Usuario(apellidos1: "jajant", apellidos2: "jake", correo: "milicia.sdljfsd", nombre: "Jake");

    echo "<pre>";
    var_dump($usuario);
    echo "</pre>";