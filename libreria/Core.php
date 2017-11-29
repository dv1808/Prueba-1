<?php

/* 
 * PHP FILE
 * Se definen las variables de entorno que mantendran 
 * de manera global todos los valores ....? :V
 */
include "ayuda/Ayuda.php";

define("APLICACION_RUTA",RUTA_BASE."aplicacion/");
define("VISTA_RUTA",RUTA_BASE."vista/");
define("LIBRERIA",RUTA_BASE."libreria/");
define("RUTA",APLICACION_RUTA."ruta/");
define("MODELO",APLICACION_RUTA."modelo/");

include RUTA_BASE."configuracion/Configuracion.php";
include "ORM/Conexion.php";
include "ORM/Modelo.php";

includeModels();

include "Vista.php";
include "Ruta.php";
include RUTA."Rutas.php";


/**

//echo RUTA;
//configuraciones

*/