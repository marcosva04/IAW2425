<form action="saludo.php" method="POST">
    <input type="text" name="caja" placeholder="Escribe">
    <input type="submit" value="Enviar"></form>
    <?php
        if(isset($_POST["caja"])){// si tiene algo
            echo 'Hola ' . htmlspecialchars($_POST["caja"]). "!". "<br>";
            echo 'Hoy es ' . date("d/m/Y");

        }

        
    ?>
