<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foreach</title>
</head>
<body>
    <?php

    $refranes = ["A quien madruga, Dios le ayuda.",

    "Más vale tarde que nunca.",
    
    "No hay mal que por bien no venga.",
    
    "En casa del herrero, cuchillo de palo.",
    
    "Quien mucho abarca, poco aprieta.",
    
    "Cría cuervos y te sacarán los ojos.",
    
    "Más vale pájaro en mano que ciento volando.",
    
    "A caballo regalado no se le mira el diente.",
    
    "El que mucho se despide, pocas ganas tiene de irse.",
    
    "No dejes para mañana lo que puedas hacer hoy."];

    echo "<ul>";
    foreach ($refranes as $refran){
        echo "<li>$refran</li>";
    }
    echo "</ul>";
?>
</body>
</html>