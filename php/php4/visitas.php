<?php
   if ( isset( $_COOKIE[ 'visitas' ] ) ) {

    setcookie( 'visitas', $_COOKIE[ 'visitas' ] + 1, time() + 3600 * 24 );
     
    $mensaje = 'Numero de visitas: '.$_COOKIE[ 'visitas' ];
}
else {

    setcookie('lang', $_SERVER['HTTP_ACCEPT_LANGUAJE'], time()+3600*24);

    setcookie( 'visitas', 1, time() + 3600 * 24 );
    $mensaje = 'Bienvenido por primera vez a nuesta web' . 'su lenguaje es ';
}

echo $mensaje;
?>  
