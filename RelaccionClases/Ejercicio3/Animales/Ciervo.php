<?php
    class Ciervo{
        public function __construct(
            public int $tamaño,
            public String $longCuernos,
            public String $color,
            public String $nombre,
        )
        {}

        public function getLongCuernos(): string
        {
            return $this->longCuernos;
        }

        public function setLongCuernos(string $longCuernos): void
        {
            $this->longCuernos = $longCuernos;
        }
        public function mostrar_propiedades() {
            echo "El tamaño del perro es {$this->getTamaño()}, su color {$this->getColor()}, su raza {$this->getLongCuernos()} y su nombre: {$this->getNombre()}.";
        }

        public function speak($mensaje) {
            echo "{$this->getNombre()} dice: $mensaje\n";
        }

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