<?php

    class Empleado{
        private $nombre;
        private $apellidos;

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getNombre(){
           return $this-> nombre;
        }


        public function getApellidos()
        {
            return $this->apellidos;
        }


        public function setApellidos($apellidos): void
        {
            $this->apellidos = $apellidos;
        }

    }