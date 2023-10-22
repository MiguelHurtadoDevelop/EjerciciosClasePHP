<?php
class Coche{




    public function __construct(
        public string $color = 'rojo',
        public string $marca = 'ferrari',
        public string $modelo = 'aventador',
        public int $velocidad = 300,
        public int $caballos = 500,
        public int $plazas = 2
    ) {}


    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca): void
    {
        $this->marca = $marca;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): void
    {
        $this->modelo = $modelo;
    }

    public function getVelocidad(): int
    {
        return $this->velocidad;
    }

    public function setVelocidad(int $velocidad): void
    {
        $this->velocidad = $velocidad;
    }

    public function getCaballos(): int
    {
        return $this->caballos;
    }

    public function setCaballos(int $caballos): void
    {
        $this->caballos = $caballos;
    }

    public function getPlazas(): int
    {
        return $this->plazas;
    }

    public function setPlazas(int $plazas): void
    {
        $this->plazas = $plazas;
    }

    public function acelerar(){
        $this->velocidad++;
    }

    public function frenar(){

        $this->velocidad--;
    }


}

