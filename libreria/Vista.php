<?php namespace Vista;

/*
 * PHP CLASS
 */

class Vista {
    public static function crear($path,$key=null,$value=null){  
            //comprobamos si existe la varible path
            if($path !=""){
                $paths= explode(""."", $path);//convertimos a un array separado por puntos
                $ruta="";//inicializamos
                for($i= 0;$i<count($paths);$i++){//recorrer el paths
                    if($i==count($paths)-1){//comprobamos si es el ultimo
                        $ruta.=$paths[$i].".php"; //si es le ponemos.php
                    }else{
                    $ruta.=$paths[$i]."/";//le concatenamos (/)
                    }
                }
                if(file_exists(VISTA_RUTA.$ruta)){                  
                    //comprobar si existe el key=usuario
                    if(!is_null($key)){
                        if(is_array($key)){
                            //extrae los keys y lso convierte a variables
                            extract($key,EXTR_PREFIX_SAME,"");
                        }else{
                            //
                            ${$key}=$value;
                        }   
                        
                    }
                    include VISTA_RUTA.$ruta;
                }else{
                    die("no existe la vista");
                }
                
                        
            }
        return null;
    }
}
