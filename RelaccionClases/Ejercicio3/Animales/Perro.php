<?php
    require_once ("Animal.php");
    class Perro extends  Animal{

        public function __construct(string $tamaño, string $color, string $nombre, public string $raza) {
            parent::__construct($tamaño, $color, $nombre);

        }
        public function mostrar_propiedades() {
            echo "El tamaño del perro es {$this->getTamaño()}, su color {$this->getColor()}, su raza {$this->getRaza()} y su nombre: {$this->getNombre()}.";
        }

        public function speak($mensaje) {
            echo "{$this->getNombre()} dice: $mensaje\n";
        }


        public function getRaza(): string
        {
            return $this->raza;
        }

        public function setRaza(string $raza): void
        {
            $this->raza = $raza;
        }




    }