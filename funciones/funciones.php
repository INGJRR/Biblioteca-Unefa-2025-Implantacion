<?php 
function validar_y_convertir_numero($numero,&$error) {
    //Condiciones
    // Solo permite numeros con 7 hasta 9 digitos




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
    } else {
        $error = true;
        return '';
    }
}

function validar_y_convertir_numero_cedula($numero,&$error) {
    //Condiciones
    // Solo numeros desde el 100 Mil al 99 Millones

    // Verificamos si el número está vacío
    if (empty($numero)) {
        $error = true;
        return '';
    }

    // Expresión regular más robusta: solo permite dígitos 7 al 9
    $patron = "/^\d{6,8}$/";

    // Verificamos si el número coincide con el patrón
    if (preg_match($patron, $numero)) {
        // Convertimos el número a entero (ya que el patrón solo permite dígitos)
        $numero_entero = intval($numero);
        if($numero_entero >= 100000 && $numero_entero < 100000000){
            return $numero_entero;
        }else{
            $error = true;
            return '';
        }
    } else {
        $error = true;
        return '';
    }
}

function validar_nombre($nombre, &$error) {

    //condiciones
    // Solo letras, numeros de letras: minimo: 3 , Max: 100


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
    //condiciones
    // solo admiten numeros, cantidad minima: 1 Maxima: 100



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
    //condiciones
    // Debe tener la forma "usuario@dominio.extensión". El usuario puede contener: letras, números, guiones bajos (_) y puntos (.)

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        $error = true;
        return '';
    }
}
function validarSoloLetrasNumeros($cadena, &$error ,$longitudMaxima = 100) {

    //condiciones
    // Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100



    // Expresión regular para validar letras, números y espacios
    $patron = "/^[a-zA-Z0-9\sÀ-ÖØ-öø-ÿ]{2,$longitudMaxima}$/";

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
    //condiciones
    // Letra y numeros, ejemplo: O987P789 o K987P890 o LIK321P865



    // Expresión regular para validar el formato de la cota
    // Verificar si el campo está vacío
    if (empty($cota)) {
        $error = true;
        return "";
    }

    // Verificar si la cota cumple con el patrón
    if (preg_match('/^[A-Z.]*?[A-Z]?\d{3}[A-Z]\d{3}$/', $cota)) {
        return $cota; // Si pasa todas las validaciones, retorna true
    }else{
        // la cadena no cumple con el patro
        $error = true;
        return '';
    }
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

function validarFecha2($fecha, &$error) {

    //condiciones
    // Formato valido 2000-10-01 Año, mes, dia

    // Patrón de expresión regular para validar la fecha
    $patron = "/^\d{4}-\d{2}-\d{2}$/";

    // Verificar si la cadena coincide con el patrón
    if (preg_match($patron, $fecha)) {
        // Separar la fecha en año, mes y día
        list($año, $mes, $dia) = explode('-', $fecha);

        // Validar si es una fecha válida
        if (checkdate($mes, $dia, $año)) {
            return $fecha;
        }
    }
    $error = true;
    return '';
}

function validarNumeroTelefono($numero, &$error) {

    //condiciones
    // Solo numeros Empieza por 04 y debe de tener 11 caracteres

    $patron = "/^04\d{9}$/";

    // Verificar si la cadena coincide con el patrón
    if (preg_match($patron, $numero)) {
        return $numero;
    }

    $error = true;
    return '';
}

function BuscarDocumento($cota, $tabla, $conexion, &$error, &$mensaje, &$tipo_libro){
    // Preparar la consulta (protege contra inyecciones SQL)
    $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE cota = ?");
    $stmt->bind_param("s", $cota);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows == 1) {
        //todo esta bien
        $row = $result->fetch_assoc();
        if(intval($row["cantidad"]) > 1){
            // hay ejemplares para prestar
            $mensaje = true;
        }else{
            // solo queda un libro
            $error = true;
            $mensaje = false;
            $tipo_libro = '';
        }
    }else{
        $error = true;
        $mensaje = false;
        $tipo_libro = '';
    }
}

function BuscarPersona($cedula, $tabla, $conexion, &$error, &$mensaje){
    // Preparar la consulta (protege contra inyecciones SQL)
    $stmt = $conexion->prepare("SELECT * FROM $tabla WHERE cedula = ?");
    $stmt->bind_param("s", $cedula);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $result = $stmt->get_result();

    // Verificar si se encontró algún registro
    if ($result->num_rows == 1) {
  

        $row = $result->fetch_assoc();
        if((!$row["moroso"]) && $row["credito"] != 0){
            //todo esta bien significa que no esta moroso y tiene credito
            $mensaje = true;
        }else{
            $error = true;
            $mensaje = false;
        }
    }else{
        $error = true;
        $mensaje = false;
    }
}

function ejecutar_actualizacion($sql, $conexion) {
    // Ejecuta la consulta SQL
    if ($conexion->query($sql) === TRUE) {
        // echo "La actualización se realizó correctamente.";
    } else {
        // echo "Error al actualizar los datos: " . $conexion->error;
    }
}

function DeterminarPersona($dato){
    $persona_sql = '';
    switch($dato){
        case 'Estudiante': $persona_sql = "estudiantes";
        break;
        case 'Profesor': $persona_sql = "profesores";
        break;
        case 'Obrero': $persona_sql = "obreros";
        break;
        default: $persona_sql = '';
    }
    return $persona_sql;
}

function DeterminarDocumento($dato){
    $doc_sql = '';
    switch($dato){
        case 'Libro': $doc_sql = "libros";
        break;
        case 'Servicio comunitario': $doc_sql = "servicio_comunitario";
        break;
        case 'Trabajo de investigacion': $doc_sql = "trabajos_investigacion";
        break;
        default: $doc_sql = '';
    }
    return $doc_sql;
}

?>