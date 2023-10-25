<?php

namespace PanelAdministrador;
use MisClases\Usuario, MisClases\Categoria, MisClases\Entrada;
class Principal
{
    private Usuario $usuariop;
    private $categoriap;
    private $Entradap;


    public function __construct()
    {
        $this->usuariop = new Usuario();
        $this->categoriap = new Categoria();
        $this->Entradap = new Entrada();

    }

    public function getUsuariop(): Usuario
    {
        return $this->usuariop;
    }

    public function setUsuariop(Usuario $usuariop): void
    {
        $this->usuariop = $usuariop;
    }

    public function getCategoriap(): Categoria
    {
        return $this->categoriap;
    }

    public function setCategoriap(Categoria $categoriap): void
    {
        $this->categoriap = $categoriap;
    }

    public function getEntradap(): Entrada
    {
        return $this->Entradap;
    }

    public function setEntradap(Entrada $Entradap): void
    {
        $this->Entradap = $Entradap;
    }

}