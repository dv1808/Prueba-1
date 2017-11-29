<?php

/* 
 * PHP FILE
 */

function includeModels(){
    $directorio= opendir(MODELO);
    while($archivo= readdir($directorio)){
        if(!is_dir($archivo)){
            require_once MODELO.$archivo;;
        }
    }
    
}