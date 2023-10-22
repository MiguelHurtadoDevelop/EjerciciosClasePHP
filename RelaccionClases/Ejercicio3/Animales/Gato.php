<?php
class Gato{
    public function __construct(
        public int $tamaño,
        public String $raza,
        public String $color,
        public String $nombre,
    )
    {}
    public function mostrar_propiedades() {
        echo "El tamaño del perro es {$this->getTamaño()}, su color {$this->getColor()}, su raza {$this->getRaza()} y su nombre: {$this->getNombre()}.";
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

    public function getRaza(): string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): void
    {
        $this->raza = $raza;
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