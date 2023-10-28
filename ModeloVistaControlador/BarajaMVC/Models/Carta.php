<?php
namespace Models;

class Carta{
    const PALOS = ["ESPADAS", "OROS", "COPAS", "BASTOS"];
    const CARTAS = array(1=>"as", 2=>"dos", 3=>"tres", 4=>"cuatro", 5=>"cinco", 6=>"seis", 7=>"siete", 8=>"ocho",
        9=>"nueve", 10=>"sota", 11=>"caballo", 12=>"rey");

    function __construct(private int $numero,
                        private  string $palo){

    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getPalo(): string
    {
        return $this->palo;
    }

    public function setPalo(string $palo): void
    {
        $this->palo = $palo;
    }
    public static function compruebaPalo($palo):bool{
        return in_array(stroupper($palo),self::CARTAS);
    }
    public static function compruebaNumero($value):bool{
        return array_key_exists(stroupper($value),self::CARTAS);
    }
    public function __toString(): string
    {
        $num = self::CARTAS[$this->numero];
        return $num."de".$this->palo;
    }
}