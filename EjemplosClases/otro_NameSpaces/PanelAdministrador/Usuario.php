<?php

namespace PanelAdministrador;

class Usuario
{

    private $nombre;
    private $email;


    public function __construct()
    {
        $this->nombre = "Migue pepito";
        $this->email = "migue@brrrrrrrrr-com";
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    function informacion(){
        echo __NAMESPACE__;
    }
}