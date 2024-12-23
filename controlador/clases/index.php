<?php
    require_once 'estudiante.php';
    require_once 'profesor.php';
    require_once 'libro.php';
    require_once 'trabajo_investigacion.php';
    require_once 'servicio_comunitario.php';
    require_once 'pasantia.php';

    $persona = new Persona('30414587',"Jesus Francisco",'Rios Ramos','08-09-2024',"La vecindad",'04264145874','frrriosramos@gmail.com',0,0);
    // $estudiante = new Estudiante('30414587',"Jesus Francisco",'Rios Ramos','08-09-2024',"La vecindad",'04264145874','frrriosramos@gmail.com',0,0,8,"Ing sistema");
    $estudiante = Estudiante::obtener_datos_y_crear_objeto('30414587');
    $profesor = Profesor::obtener_datos_y_crear_objeto('666777888');
    // $profesor = new Profesor('30414587',"Jesus Francisco",'Rios Ramos','08-09-2024',"La vecindad",'04264145874','frrriosramos@gmail.com',1,1,'01-12-2024',"Ing sistema");
    // $libro = new Libro('cota1',"Sistemas",'Rios Jesus','10-12-2024','10-12-2025',100,'INGRIOS',"Sistemas","Informativo");
    $libro = Libro::obtener_datos_y_crear_objeto('LIB-014');
    $trabajo_inv = Trabajo_investigacion::obtener_datos_y_crear_objeto('COT-004');
    $servicio_comunitario = Servicio_comunitario::obtener_datos_y_crear_objeto('SER-015');
    $pasantia = Pasantia::obtener_datos_y_crear_objeto('PAS-015');
    $estudiantes = Estudiante::obtener_datos_y_crear_objetos_todos();
    $profesores = Profesor::obtener_datos_y_crear_objetos_todos();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objetos</title>
</head>

    <style>
        .hijo{
            margin: 5px 10px;
            min-width: 350px;
            padding: 5px 20px;
        }
    </style>

<body style="background-color: darkblue; margin: 0; padding:0; color: white; font-size: 30px">
    <h1 style="text-align: center;">Bienvenido a objetos</h1>

    <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
        <div>
            <h1 style="text-align: center;" >Datos de los profesores</h1>
            <div style="width: 40vw; height: 90vh; margin: auto; display: flex; flex-wrap: wrap; overflow: scroll; overflow-x: hidden;">
                <?php foreach($profesores as $profesorin):?>
                <div class="hijo">
                    <?php echo ($profesorin ==! null) ? $profesorin->datos_personales() : "Error a obtener los datos" ?>
                </div>
                <?php endforeach?>
            </div>
        </div>

        <div>
            <h1 style="text-align: center;" >Datos de los estudiante</h1>
            <div style="width: 40vw; height: 90vh; margin: auto; display: flex; flex-wrap: wrap; overflow: scroll; overflow-x: hidden;">
                <?php foreach($estudiantes as $estudiantein):?>
                <div class="hijo">
                    <?php echo ($estudiantein ==! null) ? $estudiantein->datos_personales() : "Error a obtener los datos" ?>
                </div>
                <?php endforeach?>
            </div>
        </div>

        <div class="hijo">
            <h1>Datos de Pasantia</h1>
            <?php echo ($pasantia ==! null) ? $pasantia->get_datos() : "Error a obtener los datos" ?>
        </div> 
        <div class="hijo">
            <h1>Datos de servicio comunitario</h1>
            <?php echo ($servicio_comunitario ==! null) ? $servicio_comunitario->get_datos() : "Error a obtener los datos" ?>
        </div> 
        <div class="hijo">
            <h1>Datos del Trabajo de investigacion</h1>
            <?php echo ($trabajo_inv ==! null) ? $trabajo_inv->get_datos() : "Error a obtener los datos" ?>
        </div>
        <div class="hijo">
            <h1>Datos del Libro</h1>
            <?php $libro->get_datos() ?>
        </div>
        <div class="hijo">
          <h1>Datos de la Persona</h1>
          <?php $persona->datos_personales() ?>
        </div>
        <div class="hijo">
            <h1>Datos del estudiante</h1>
            <?php echo ($estudiante ==! null) ? $estudiante->datos_personales() : "Error a obtener los datos" ?>
        </div>
        <div class="hijo">
            <h1>Datos del profesor</h1>
            <?php $profesor->datos_personales() ?>
        </div>
    </div>
</body>
</html>