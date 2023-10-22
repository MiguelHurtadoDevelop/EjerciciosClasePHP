<?php

require_once ("BaseCalc.php");
class MulCalc extends BaseCalc{

    public function __construct(float $num1, float $num2)
    {
        parent::__construct($num1, $num2);
    }

    public function calculate()
    {
        echo "La multiplicación de los dos numeros es:".$this->num1*$this->num2;
    }
}