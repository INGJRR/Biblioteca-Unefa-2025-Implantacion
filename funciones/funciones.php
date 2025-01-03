<?php 
function validar_y_convertir_numero($numero,&$error) {
    // Verificamos si el número está vacío
    if (empty($numero)) {
        $error = true;
        return '';
    }

    // Expresión regular más robusta: solo permite dígitos 7 al 9
    $patron = "/^\d{7,9}$/";

    // Verificamos si el número coincide con el patrón
    if (preg_match($patron, $numero)) {
        // Convertimos el número a entero (ya que el patrón solo permite dígitos)
        $numero_entero = intval($numero);
        return $numero_entero;
    } else {
        $error = true;
        return '';
    }
}

function validar_nombre($nombre, &$error) {
    // Expresión regular para validar solo letras y espacios
    $patron = "/^[a-zA-Z\sÀ-ÖØ-öø-ÿ]+$/";

    // Verificamos si el nombre está vacío
    if (empty($nombre)) {
        $error = true;
        return '';
    }

    // Verificamos la longitud del nombre (ajusta el rango según tus necesidades)
    $longitud_minima = 3;
    $longitud_maxima = 50;
    if (strlen($nombre) < $longitud_minima || strlen($nombre) > $longitud_maxima) {
        $error = true;
        return '';
    }

    // Verificamos si el nombre coincide con el patrón
    if (preg_match($patron, $nombre)) {
        return $nombre;
    } else {
        $error = true;
        return '';
    }
}

function esNumeroValido($numero, $limite ,&$error) {
    if (!preg_match('/^\d{1,13}$/', $numero)) {
        $error = true;
        return '';
    }

    // Validación adicional: verificar si el número es mayor a 0
    if ($numero <= 0 ) {
        $error = true;
        return '';
    }

    //vereficamos si hay un limite y que el numero no pase ese limite
    if($limite != 0){
        if($numero > $limite){
            $error = true;
            return '';
        }
    }


    return $numero;
}
function validarEmail($email, &$error) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        $error = true;
        return '';
    }
}
function validarSoloLetrasNumeros($cadena, &$error ,$longitudMaxima = 100) {
    // Expresión regular para validar letras, números y espacios
    $patron = "/^[a-zA-Z0-9\sÀ-ÖØ-öø-ÿ]{4,$longitudMaxima}$/";

    // Verificar si la cadena está vacía
    if (empty($cadena)) {
        $error = true;
        return ''; // Cadena vacía no es válida
    }

    // Aplicar la expresión regular
    if (preg_match($patron, $cadena)) {
        return $cadena;
    } else {
        $error = true;
        return '';
    }
}

function validar_cota($cota, &$error) {
    // Expresión regular para validar el formato de la cota
    $patron = "/^[A-Z]{3}-\d{3,4}$/";

    // Verificar si el campo está vacío
    if (empty($cota)) {
        $error = true;
        return "";
    }

    // Verificar si la cota cumple con el patrón
    if (!preg_match($patron, $cota)) {
        $error = true;
        return '';
        // return "La cota debe tener 3 letras mayúsculas al inicio, seguidas de un guión y 3 o 4 números.";
    }

    return $cota; // Si pasa todas las validaciones, retorna true
}

function esIdValidoCarrera($id, $arrayCarreras, &$error) {
    foreach ($arrayCarreras as $carrera) {
        if ($carrera['id'] == $id) {
            return $id;
        }
    }
    $error = true;
    return '';
}


?>