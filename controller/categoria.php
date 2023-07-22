<?php
// Import necessary files and create objects
require_once "../config/conexion.php";
require_once "../models/Categoria.php";

$categoria = new Categoria();

// Handle different operations based on 'op' parameter
if (isset($_GET["op"])) {
    $operation = $_GET["op"];

    if ($operation == "combo") {
        // Get data from the 'Categoria' model
        $datos = $categoria->get_categoria();

        // Generate HTML options if data is available
        if (is_array($datos) && count($datos) > 0) {
            $html = "";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row['cat_id'] . "'>" . $row['cat_nom'] . "</option>";
            }
            echo $html;
        } else {
            echo "No data available.";
        }
    } else {
        echo "No operation to process.";
    }
} else {
    echo "Operation parameter 'op' is missing.";
}
