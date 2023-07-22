<?php
class Validaciones_usuario
{
    public static function isEmpty($value)
    {
        return empty($value);
    }

    public static function isValidUser($resultado)
    {
        return is_array($resultado) && count($resultado) > 0;
    }

}
