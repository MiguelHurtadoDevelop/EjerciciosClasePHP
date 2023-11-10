<?php

namespace Validacion;

/**
 *Clase con los metodos para realizar la validación de todos los inputs del programa
 */
class classValidate
{
    /**
     * @param $importe
     * @return bool
     * Metodo que valida el Importe introducido
     */
    public static function validarImporte($importe):bool {

        if (empty($importe)) {
            return false;
        }
        if(!filter_var($importe, FILTER_VALIDATE_FLOAT)){
            return false;
        }
        if (!preg_match("/^[-0-9.]+$/", $importe)) {
            return false;
        }

        if (!is_numeric($importe)) {
            return false;
        }


        return true;
    }

    /**
     * @param $fecha
     * @return bool
     * Metodo que valida la Fecha introducida
     */
    public static function validarFecha($fecha): bool {
        // Verificar si la cadena de fecha no está vacía
        if (empty($fecha)) {
            return false;
        }

        $formato = 'd/m/Y';

        // Usar preg_match para validar el formato de la fecha
        if (preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $fecha)) {
            // Intentar crear un objeto DateTime a partir de la cadena
            $fechaObj = \DateTime::createFromFormat($formato, $fecha);

            // Verificar si se creó correctamente y si la cadena coincide con el formato
            return $fechaObj && $fechaObj->format($formato) === $fecha;
        }

        return false;
    }

    /**
     * @param $Concepto
     * @return bool
     * Metodo que valida el Concepto introducido
     */
    public static function  validarConcepto($Concepto):bool {

        if (empty($Concepto)) {

            return false;
        }


        if (strlen($Concepto) > 50) {

            return false;
        }


        if (!preg_match("/^[àÀÈèÌìòùÒÙña-zA-Z0-9\s\/]+$/", $Concepto)) {
            return false;
        }

        return true;
    }
}