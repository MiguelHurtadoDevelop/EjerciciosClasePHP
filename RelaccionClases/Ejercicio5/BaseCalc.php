<?php

    class BaseCalc{

        public function __construct(
           public float $num1,
           public float $num2
        ){}

        public function calculate(){
            echo "El numero 1 es: $this->num1, y el numero 2 es $this->num2.";
        }



    }