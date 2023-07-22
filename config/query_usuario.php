<?php

class Query_usuario extends Conectar
{
    public function executeQuery($sql, $params)
    {
        require_once("conexion.php");
        $conectar = parent::Conexion();
        parent::set_names();

        $statement = $conectar->prepare($sql);
        $index = 1; // Start index from 1

        foreach ($params as $value) {
            $statement->bindValue($index, $value);
            $index++;
        }

        $statement->execute();
        return $statement->fetch();
    }
}