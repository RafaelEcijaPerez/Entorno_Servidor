<?php
$message = '';
$message_error = '';
$fecha = [
    'fecha_inicio' => '',
    'fecha_fin' => ''
];
$error = [
    'fecha_inicio' => '',
    'fecha_fin' => '',
    'frecuencia' => '',
];

$opciones_validas = ["diaria", "semanal", "dos-semanas", "mensual"];
$frecuencia = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filters['fecha_inicio']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_inicio']['options']['regexp'] = '/[0-9\/\:\s]/';
    $filters['fecha_fin']['filter'] = FILTER_VALIDATE_REGEXP;
    $filters['fecha_fin']['options']['regexp'] = '/[0-9\/\:\s]/';

    $fecha = filter_input_array(INPUT_POST, $filters);

    if (isset($_POST["frecuencia"]) && in_array($_POST["frecuencia"], $opciones_validas)) {
        $frecuencia = $_POST["frecuencia"];
    }

    $error = [
        'fecha_inicio' => ($fecha['fecha_inicio']) ? '' : 'Error en la fecha de inicio',
        'fecha_fin' => ($fecha['fecha_fin']) ? '' : 'Error en la fecha de finalización',
        'frecuencia' => ($frecuencia !== '' && in_array($frecuencia, $opciones_validas)) ? '' : 'Error en la frecuencia seleccionada'
    ];

    $invalid = implode($error);

    if ($invalid) {
        $message_error = 'Debes solucionar los errores.';
    } else {
        // Los datos son válidos, realizar aqui los ejercicios propuestos
        //Fechas de las reuniones
        $fechas_reuniones = [];
        $inicio = DateTime::createFromFormat('d/m/Y H:i:s', $fecha['fecha_inicio']);
        $fin = DateTime::createFromFormat('d/m/Y H:i:s', $fecha['fecha_fin']);

        //recoger el intervalo para mostrar el aviso
        $intervalo = match ($frecuencia) {
            'diaria' => new DateInterval('P1D'),
            'semanal' => new DateInterval('P1W'),
            'dos-semanas' => new DateInterval('P2W'),
            'mensual' => new DateInterval('P1M'),
        };

        // Generar fechas de los avisos
        if ($intervalo) {
            $periodo = new DatePeriod($inicio, $intervalo, $fin);
            $fechas_reuniones = iterator_to_array($periodo);
        }

        // Calcular tiempos restantes
        $ahora = new DateTime();
        $tiempos_restantes = [];
        foreach ($fechas_reuniones as $fecha_reunion) {
            $diferencia = $ahora->diff($fecha_reunion);
            $tiempos_restantes[] = $diferencia->format('%a días, %h horas, %i minutos');
        }

        // Convertir a diferentes zonas horarias
        $zonas_horarias = [
            'Madrid' => new DateTimeZone('Europe/Madrid'),
            'Los Ángeles' => new DateTimeZone('America/Los_Angeles'),
            'Londres' => new DateTimeZone('Europe/London'),
            'Tokio' => new DateTimeZone('Asia/Tokyo')
        ];
        $fechas_por_zona = [];

        // Añadir fechas en las zonas horarias
        foreach ($fechas_reuniones as $fecha_reunion) {
            foreach ($zonas_horarias as $ciudad => $zona) {
                $fecha_reunion_zona = clone $fecha_reunion;
                $fecha_reunion_zona->setTimezone($zona);
                $fechas_por_zona[$ciudad][] = $fecha_reunion_zona->format('d/m/Y H:i:s');
            }
        }
        // Mostrar resultados
        $message = '
            <h2>Reuniones generadas</h2>
            <table style="border: 1px solid black; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Madrid</th>
                        <th>Los Ángeles</th>
                        <th>Londres</th>
                        <th>Tokio</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($fechas_reuniones as $key => $fecha_reunion) {
            $message .= '
                <tr style="border: 1px solid black;">
                    <td style="border: 1px solid black">' . $fecha_reunion->format('d/m/Y H:i:s') . '</td>
                    <td style="border: 1px solid black">' . $fechas_por_zona['Madrid'][$key] . '</td>
                    <td style="border: 1px solid black">' . $fechas_por_zona['Los Ángeles'][$key] . '</td>
                    <td style="border: 1px solid black">' . $fechas_por_zona['Londres'][$key] . '</td>
                    <td style="border: 1px solid black">' . $fechas_por_zona['Tokio'][$key] . '</td>
                </tr>';
        }
        $message .= '</tbody></table>';
        //tiempo restante para las reuniones
        $message .= '<h2>Tiempos restantes para las reuniones</h2>';
        $message .= '<ul>';
        //bucle para la lista de dias de la reuniones
        foreach ($tiempos_restantes as $tiempo_restante) {
            $message .= '<li>' . $tiempo_restante . '</li>';
        }
        $message .= '</ul>';
        //desfase horario
        $message .= '<h2>Desfase en horas del UTC+0</h2>';
        $message .= '<ul>';
        //bucle para la lista de desfases horarios por zona horaria
        foreach ($zonas_horarias as $ciudad => $zona) {
            //calcular el desfase horario en horas de UTC+0 para la zona horaria actual
            $desfase = (new DateTime('now', $zona))->getOffset() / 3600;
            //mostrar el desfase horario para la zona horaria actual en la lista de desfases horarios
            $message .= '<li>' . $ciudad . ': UTC' . ($desfase >= 0 ? '+' : '') . $desfase . ' horas</li>';
        }
        $message .= '</ul>';
    }
}
