<?php

namespace MisClases;

class Categoria
{
    public function __construct(
        public string $nombre = "Accion",
        public string $ndescripcion = "Categoria enfocada a las review videojuegos de accion",
    ){}
}