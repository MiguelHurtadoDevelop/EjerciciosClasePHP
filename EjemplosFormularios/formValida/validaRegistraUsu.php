<?php

    function validar_requerido(string $texto): bool{
        return !(trim($texto)=='');
    }

    function son_letras(string $texto):bool{
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/";
        return preg_match($patron_texto,$texto);
    }