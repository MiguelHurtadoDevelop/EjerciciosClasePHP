<?php

    class Usuario{
        private string $nombre;
        private string $apellidos1;
        private string $apellidos2;
        private string $correo;


        public function __construct(string $nombre, string $apellidos1, string $apellidos2, string $correo)
        {
            $this->nombre = $nombre;
            $this->apellidos1 = $apellidos1;
            $this->apellidos2 = $apellidos2;
            $this->correo = $correo;
        }





    }