<?php
require_once ("BaseCalc.php");
require_once ("SubCalc.php");
require_once ("AddCalc.php");
require_once ("MulCalc.php");
require_once ("DivCalc.php");

$Base = new BaseCalc(1,2);

echo $Base->calculate()."<br>";


$Add = new AddCalc(1,2);

echo $Add->calculate()."<br>";

$Sub = new SubCalc(1,2);

echo $Sub->calculate()."<br>";

$Mul = new MulCalc(1,2);

echo $Mul->calculate()."<br>";

$Div = new DivCalc(1,2);

echo $Div->calculate()."<br>";


