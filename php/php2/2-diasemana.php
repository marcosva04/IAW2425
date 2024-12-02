<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>diasemana</title>
</head>
<body>
    <?php
    $dia = date("l");

    echo "Hoy es " . $dia . "<br>";

    echo "Feliz ";

    switch ($dia){
    case 'Monday':
        echo "lunes";
    
    break;
    case 'Tuesday':
        echo "martes";
    
    break;
    case 'Wednesday':
        echo "miercoles";
    
    break;
    case 'Thursday':
        echo "jueves";
    
    break;
    case 'Friday':
        echo "viernes";
    
    break;
    case 'Saturday':
        echo "sábado";
    
    break;
    case 'Sudnay':
        echo "domingo";
    
    break;
    }

?>
</body>
</html>