<?php 
//Definicion para los alumnos
$Alumnos =[
    ['nombre'=>'Alex García',
    'Fecha de Nacimiento'=>'14-13-2115',
    'Lugar de Residencia' =>'Madrid',
    'Telefono'=>'698997763',
    'Correo Electronico'=>'alex.garcia@example.com',
    'Estado de Repetidor'=>'No',
],
    ['nombre'=>'Maria López',
    'Fecha de Nacimiento'=>'21-15-2115',
    'Lugar de Residencia' =>' Barcelona',
    'Telefono'=>'612321147',
    'Correo Electronico'=>'maria.lopez@example.com',
    'Estado de Repetidor'=>'Sí',
    ],
    ['nombre'=>'Juan Pérez',
    'Fecha de Nacimiento'=>'18-11-2114',
    'Lugar de Residencia' =>' Sevilla',
    'Telefono'=>'677998844',
    'Correo Electronico'=>'juan.perez@example.com',
    'Estado de Repetidor'=>'No',
    ],
    ['nombre'=>'Lucía Sánchez',
    'Fecha de Nacimiento'=>'22-19-2115',
    'Lugar de Residencia' =>' Valencia',
    'Telefono'=>'664889977',
    'Correo Electronico'=>'lucia.sanchez@example.com',
    'Estado de Repetidor'=>'Sí',
    ],
    ['nombre'=>'Carlos Martínez',
    'Fecha de Nacimiento'=>'15-11-2115',
    'Lugar de Residencia' =>'Zaragoza',
    'Telefono'=>'618997755',
    'Correo Electronico'=>' carlos.martinez@example.com',
    'Estado de Repetidor'=>'No',
    ],

];
//Notas de las asignaturas de los alumnos
$Matematicas =[
    [
        'Examen1'=>6,
        'Examen2'=>7,
        'Examen3'=>8,
        'Examen4'=>6,
        'Examen5'=>7,
    
    ],
    [
        'Examen1'=>5,
        'Examen2'=>6,
        'Examen3'=>7,
        'Examen4'=>6,
        'Examen5'=>6,
    
    ],
    [
        'Examen1'=>7,
        'Examen2'=>6,
        'Examen3'=>8,
        'Examen4'=>7,
        'Examen5'=>7,
    
    ],
    [
        'Examen1'=>4,
        'Examen2'=>5,
        'Examen3'=>4,
        'Examen4'=>3,
        'Examen5'=>4,
    
    ],
    [
        'Examen1'=>5,
        'Examen2'=>4,
        'Examen3'=>5,
        'Examen4'=>4,
        'Examen5'=>5,
    
    ],
];
$Lengua =[
    [
        'Examen1'=> 5,
        'Examen2' => 6,
        'Comentario de Texto' => 7,
    ],
    [
        'Examen1'=> 6,
        'Examen2' => 5,
        'Comentario de Texto' => 7,
    ],
    [
        'Examen1'=> 6,
        'Examen2' => 7,
        'Comentario de Texto' => 6,
    ],
    [
        'Examen1'=> 5,
        'Examen2' => 5,
        'Comentario de Texto' => 6,
    ],
    [
        'Examen1'=> 4,
        'Examen2' => 4,
        'Comentario de Texto' => 5,
    ],

];
$Ingles =[
    [
        'Lectura'=> 6,
        'Comprensión Auditiva'=> 7,
        'Expresión Oral' =>6,
        'Escritura' => 6,
    ],
    [
        'Lectura'=> 6,
        'Comprensión Auditiva'=> 6,
        'Expresión Oral' =>5,
        'Escritura' => 6,
    ],
    [
        'Lectura'=> 7,
        'Comprensión Auditiva'=> 6,
        'Expresión Oral' =>7,
        'Escritura' => 6,
    ],
    [
        'Lectura'=> 4,
        'Comprensión Auditiva'=> 4,
        'Expresión Oral' =>5,
        'Escritura' => 4,
    ],
    [
        'Lectura'=> 5,
        'Comprensión Auditiva'=> 4,
        'Expresión Oral' =>4,
        'Escritura' => 4,
    ],
];
$Tecnologia=[
    [
        'Proyecto' => 8,
        'Participación' => 7,
    ],
    [
        'Proyecto' => 6,
        'Participación' => 7,
    ],
    [
        'Proyecto' => 8,
        'Participación' => 6,
    ],
    [
        'Proyecto' => 5,
        'Participación' => 4,
    ],
    [
        'Proyecto' => 4,
        'Participación' => 5,
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.2">
    <title>Notas de Alumnos</title>
</head>
<body>
    <h1>Voletin de Alumnos</h1>
    
    <hr>
    <h1>Voletin de Alumnos</h1>
    <hr>
    <h2>Estudiante :<?= $Alumnos[0]['nombre'] ?></h2>
    <h3>Datos Personales</h3>
    <ul>
        <li>Fecha de Nacimiento <?= $Alumnos[0]['Fecha de Nacimiento'] ?></li>
        <li>Lugar de Residencia <?= $Alumnos[0]['Lugar de Residencia'] ?></li>
        <li>Teléfono <?= $Alumnos[0]['Telefono'] ?></li>
        <li>Correo Electrónico <?= $Alumnos[0]['Correo Electronico'] ?></li>
        <li>Repetidor <?= $Alumnos[0]['Estado de Repetidor'] ?></li>
    </ul>
    <h3>Asignaturas</h3>
    <p>
        Matematicas
        <? //Dividimos entre 5?>
        <?= ($Matematicas[0]['Examen1'] +$Matematicas[0]['Examen2']+$Matematicas[0]['Examen3'] +$Matematicas[0]['Examen4']+$Matematicas[0]['Examen5'])/5?>
    </p>
    <p>
        Lengua <?=
            (($Lengua[0]['Examen1'] + $Lengua[0]['Examen2'])/2)*0.4 +($Prueva =$Lengua[0]['Comentario de Texto']*0.6);
            //multiplicar entre 0.4                            //sumar las notas              //multiplicar entre 0.6
        ?> 
    </p>
    <p>
        Inglés 
        <?= ($Ingles[0]['Comprensión Auditiva'] + $Ingles[0]['Escritura'] + $Ingles[0]['Expresión Oral'] + $Ingles[0]['Lectura'])/4;
            //Dividimos entre 4
        ?>
    </p>
    <p>
        Tecnología
        <?= 
            $Tecnologia[0]['Participación'] *0.2 +$Tecnologia[0]['Proyecto']*0.8;
            //multiplicar entre 0.2        //sumar las notas              //multiplicar entre 0.8
        ?>
    </p>
    <p style="color: green;">Aprobado</p>
    <br>

    <h2>Estudiante :<?= $Alumnos[1]['nombre'] ?></h2>
    <h3>Datos Personales</h3>
    <ul>
        <li>Fecha de Nacimiento <?= $Alumnos[1]['Fecha de Nacimiento'] ?></li>
        <li>Lugar de Residencia <?= $Alumnos[1]['Lugar de Residencia'] ?></li>
        <li>Teléfono <?= $Alumnos[1]['Telefono'] ?></li>
        <li>Correo Electrónico <?= $Alumnos[1]['Correo Electronico'] ?></li>
        <li>Repetidor <?= $Alumnos[1]['Estado de Repetidor'] ?></li>
    </ul>
    <h3>Asignaturas</h3>
    <p>
        Matematicas
        <?= ($Matematicas[1]['Examen1'] +$Matematicas[1]['Examen2']+$Matematicas[1]['Examen3'] +$Matematicas[1]['Examen4']+$Matematicas[1]['Examen5'])/5?>
    </p>
    <p>
        Lengua <?=
            (($Lengua[1]['Examen1'] + $Lengua[1]['Examen2'])/2)*0.4 +($Prueva =$Lengua[1]['Comentario de Texto']*0.6);
        ?> 
    </p>
    <p>
        Inglés 
        <?= ($Ingles[1]['Comprensión Auditiva'] + $Ingles[1]['Escritura'] + $Ingles[1]['Expresión Oral'] + $Ingles[1]['Lectura'])/4;
        ?>
    </p>
    <p>
        Tecnología
        <?= 
            $Tecnologia[1]['Participación'] *0.2 +$Tecnologia[1]['Proyecto']*0.8;
        ?>
    </p>
    <p style="color: green;">Aprobado</p>
    <br>

    <hr>
    <h2>Estudiante :<?= $Alumnos[2]['nombre'] ?></h2>
    <h3>Datos Personales</h3>
    <ul>
        <li>Fecha de Nacimiento <?= $Alumnos[2]['Fecha de Nacimiento'] ?></li>
        <li>Lugar de Residencia <?= $Alumnos[2]['Lugar de Residencia'] ?></li>
        <li>Teléfono <?= $Alumnos[2]['Telefono'] ?></li>
        <li>Correo Electrónico <?= $Alumnos[2]['Correo Electronico'] ?></li>
        <li>Repetidor <?= $Alumnos[2]['Estado de Repetidor'] ?></li>
    </ul>
    <h3>Asignaturas</h3>
    <p>
        Matematicas
        <?= ($Matematicas[2]['Examen1'] +$Matematicas[2]['Examen2']+$Matematicas[2]['Examen3'] +$Matematicas[2]['Examen4']+$Matematicas[2]['Examen5'])/5?>
    </p>
    <p>
        Lengua <?=
            (($Lengua[2]['Examen1'] + $Lengua[2]['Examen2'])/2)*0.4 +($Prueva =$Lengua[2]['Comentario de Texto']*0.6);
        ?> 
    </p>
    <p>
        Inglés 
        <?= ($Ingles[2]['Comprensión Auditiva'] + $Ingles[2]['Escritura'] + $Ingles[2]['Expresión Oral'] + $Ingles[2]['Lectura'])/4;
        ?>
    </p>
    <p>
        Tecnología
        <?= 
            $Tecnologia[2]['Participación'] *0.2 +$Tecnologia[2]['Proyecto']*0.8;
        ?>
    </p>
    <p style="color: green;">Aprobado</p>
    <br>
    
    <hr>
    <h2>Estudiante :<?= $Alumnos[3]['nombre'] ?></h2>
    <h3>Datos Personales</h3>
    <ul>
        <li>Fecha de Nacimiento <?= $Alumnos[3]['Fecha de Nacimiento'] ?></li>
        <li>Lugar de Residencia <?= $Alumnos[3]['Lugar de Residencia'] ?></li>
        <li>Teléfono <?= $Alumnos[3]['Telefono'] ?></li>
        <li>Correo Electrónico <?= $Alumnos[3]['Correo Electronico'] ?></li>
        <li>Repetidor <?= $Alumnos[3]['Estado de Repetidor'] ?></li>
    </ul>
    <h3>Asignaturas</h3>
    <p>
        Matematicas
        <?= ($Matematicas[3]['Examen1'] +$Matematicas[3]['Examen2']+$Matematicas[3]['Examen3'] +$Matematicas[3]['Examen4']+$Matematicas[3]['Examen5'])/5?>
    </p>
    <p>
        Lengua <?=
            (($Lengua[3]['Examen1'] + $Lengua[3]['Examen2'])/2)*0.4 +($Prueva =$Lengua[3]['Comentario de Texto']*0.6);
        ?> 
    </p>
    <p>
        Inglés 
        <?= ($Ingles[3]['Comprensión Auditiva'] + $Ingles[3]['Escritura'] + $Ingles[3]['Expresión Oral'] + $Ingles[3]['Lectura'])/4;
        ?>
    </p>
    <p>
        Tecnología
        <?= 
            $Tecnologia[3]['Participación'] *0.2 +$Tecnologia[3]['Proyecto']*0.8;
        ?>
    </p>
    <p style="color: red;">Suspenso</p>
    <br>
   
    <hr>
    <h2>Estudiante :<?= $Alumnos[4]['nombre'] ?></h2>
    <h3>Datos Personales</h3>
    <ul>
        <li>Fecha de Nacimiento <?= $Alumnos[4]['Fecha de Nacimiento'] ?></li>
        <li>Lugar de Residencia <?= $Alumnos[4]['Lugar de Residencia'] ?></li>
        <li>Teléfono <?= $Alumnos[4]['Telefono'] ?></li>
        <li>Correo Electrónico <?= $Alumnos[4]['Correo Electronico'] ?></li>
        <li>Repetidor <?= $Alumnos[4]['Estado de Repetidor'] ?></li>
    </ul>
    <h3>Asignaturas</h3>
    <p>
        Matematicas
        <?= ($Matematicas[4]['Examen1'] +$Matematicas[4]['Examen2']+$Matematicas[4]['Examen3'] +$Matematicas[4]['Examen4']+$Matematicas[4]['Examen5'])/5?>
    </p>
    <p>
        Lengua <?=
            (($Lengua[4]['Examen1'] + $Lengua[4]['Examen2'])/2)*0.4 +($Prueva =$Lengua[4]['Comentario de Texto']*0.6);
        ?> 
    </p>
    <p>
        Inglés 
        <?= ($Ingles[4]['Comprensión Auditiva'] + $Ingles[4]['Escritura'] + $Ingles[4]['Expresión Oral'] + $Ingles[4]['Lectura'])/4;
        ?>
    </p>
    <p>
        Tecnología
        <?= 
            $Tecnologia[4]['Participación'] *0.2 +$Tecnologia[4]['Proyecto']*0.8;
        ?>
    </p>
    <p style="color: red;">Suspenso</p>
    <br>
    

</body>
</html>