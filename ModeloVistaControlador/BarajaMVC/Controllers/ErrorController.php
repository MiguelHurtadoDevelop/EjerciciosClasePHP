<?php

namespace Controllers;

class ErrorController
{
    public static function show_error404():string{
        return "<p>La pagina que buscas no existe</p>";
    }
}