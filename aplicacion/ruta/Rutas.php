<?php

/* 
 * PHP FILE
 */

$ruta=new Ruta();
$ruta->controladores
        (array(
            "/"=>"ControladorPrincipal",
            "/usuarios"=>"ControladorUsuario"));

