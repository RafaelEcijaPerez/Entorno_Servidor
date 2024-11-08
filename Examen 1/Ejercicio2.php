<?php 
    //Definicion de array
    $Lunes = ['DIW','DIW','EIE','Recreo','EIE','DWEC','DWEC',];
    $Martes =[
        'DAW','DWES ','DWES','Recreo','DWEC','DWEC','HLC',
    ];
    $Miercoles =[
        'DWES','DWES ','DWEC','Recreo','DWEC','HLC','DAW',
    ];
    $Jueves =[
        'DWES','DWES ','DIW','Recreo','DIW','EIE','EIE',
    ];
    $Viernes =[
        'DWES','DWES ','DIW','Recreo','DIW','DAW','HLC',
    ];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
            table {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            }
            th, td {
            border: 1px solid black;
            padding: 10px;
            }
            th {
            background-color: #f2f2f2;
            }
</style>
    </style>
</head>
<body>
    <table>
        <th>
            <td>Lunes</td>
            <td>Martes</td>
            <td>Miercoles</td>
            <td>Jueves</td>
            <td>Viernes</td>
        </th>
        <tr>
            <td>8:15-9:15</td>
            <td><?=$Lunes[0]; ?></td>
            <td><?=$Martes[0] ?></td>
            <td><?=$Miercoles[0] ?></td>
            <td><?=$Jueves[0] ?></td>
            <td><?=$Viernes[0] ?></td>
        </tr>
        <tr>
            <td>9:15-10:15</td>
            <td><?= $Lunes[1]; ?></td>
            <td><?=$Martes[1] ?></td>
            <td><?=$Miercoles[1] ?></td>
            <td><?=$Jueves[1] ?></td>
            <td><?=$Viernes[1] ?></td>
        </tr>
        <tr>
            <td>10:15-11:15</td>
            <td><?=$Lunes[2]; ?></td>
            <td><?=$Martes[2] ?></td>
            <td><?=$Miercoles[2] ?></td>
            <td><?=$Jueves[2] ?></td>
            <td><?=$Viernes[2] ?></td>
        </tr>
        <tr>
            <td>11:15-11:45</td>
            <td><?=$Lunes[3]; ?></td>
            <td><?=$Martes[3] ?></td>
            <td><?=$Miercoles[3] ?></td>
            <td><?=$Jueves[3] ?></td>
            <td><?=$Viernes[3] ?></td>
        </tr>
        <tr>
            <td>11:45-12:45</td>
            <td><?=$Lunes[4]; ?></td>
            <td><?=$Martes[4] ?></td>
            <td><?=$Miercoles[4] ?></td>
            <td><?=$Jueves[4] ?></td>
            <td><?=$Viernes[4] ?></td>
        </tr>
        <tr>
            <td>12:45-13:45</td>
            <td><?=$Lunes[5]; ?></td>
            <td><?=$Martes[5] ?></td>
            <td><?=$Miercoles[5] ?></td>
            <td><?=$Jueves[5] ?></td>
            <td><?=$Viernes[5] ?></td>
        </tr>
        <tr>
            <td>13:45-14:45</td>
            <td><?=$Lunes[6]; ?></td>
            <td><?=$Martes[6] ?></td>
            <td><?=$Miercoles[6] ?></td>
            <td><?=$Jueves[6] ?></td>
            <td><?=$Viernes[6] ?></td>
        </tr>
    </table>
</body>
</html>