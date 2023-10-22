<?php

require_once ("BaseCalc.php");
class DivCalc extends BaseCalc{

    public function __construct(float $num1, float $num2)
    {
        parent::__construct($num1, $num2);
    }

    public function calculate()
    {
        echo "La suma de los dos numeros es:".$this->num1/$this->num2;
    }
}