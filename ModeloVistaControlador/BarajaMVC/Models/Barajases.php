<?php
namespace Models;

class Barajases{
    private array $baraja;
    function __construct(){
        $baraja=[];
        $palos = Carta::PALOS;
        for($i=0;$i<sizeof($palos); $i++){
            for($j=1;$j<12;$j++){
                $carta = new Carta($j, $palos[$i]);
                $baraja[] = $carta;
            }
        }
        $this->setbaraja($baraja);
    }

    public function getBaraja(): array
    {
        return $this->baraja;
    }

    public function setBaraja(array $baraja): void
    {
        $this->baraja = $baraja;
    }
    public function barajar(){
        return shuffle($this->baraja);
    }
}

