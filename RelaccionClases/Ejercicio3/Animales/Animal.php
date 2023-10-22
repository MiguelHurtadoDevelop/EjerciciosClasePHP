<?php
    class Animal{
        public function __construct(
            public int $tamaño,
            public String $color,
            public String $nombre,
        )
        {}

        public function getTamaño(): int
        {
            return $this->tamaño;
        }

        public function setTamaño(int $tamaño): void
        {
            $this->tamaño = $tamaño;
        }

        public function getColor(): string
        {
            return $this->color;
        }

        public function setColor(string $color): void
        {
            $this->color = $color;
        }

        public function getNombre(): string
        {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            if (strlen($nombre) <= 20) {
                $this->nombre = $nombre;
                return true; // Nombre actualizado correctamente
            } else {
                return false; // Nombre no modificado
            }
        }




    }