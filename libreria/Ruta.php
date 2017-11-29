<?php

/*
 * PHP CLASS
 */

class Ruta {
     //metodos que nos permiten ingressar controladores con sus 
    //respectivas rutas.
    private $_controladores=array();
    public function  controladores ($controlador){
        $this->_controladores=$controlador;
        //llamada al metodo que hace el proceso de rutas
        self::submit();
    }
    public function submit(){
        $uri=isset($_GET["uri"])?$_GET["uri"]:"/";
        $paths= explode("/", $uri);
        //print_r($paths);
        //hacer condicional para saber si esta en un controlador o en la ruta principal
        if($uri=="/"){
            //echo "principal";
            $res= array_key_exists("/", $this->_controladores);
        if($res !="" && $res==1){
            foreach ($this->_controladores as $ruta =>$controller){
                if($ruta=="/"){
                    $controlador=$controller;
                }
            }
            //echo $controlador;
            $this->getController("index",$controlador);
        }
        }else{
            //echo "controlador"controladores  y metoodos
            $estado=false;
            foreach ($this->_controladores as $ruta=>$cont){
                if(trim($ruta,"/")==$paths[0]){
                    $estado=true;
                    $controlador=$cont;
                    $metodo="";
                    if(count($paths)>1){
                        $metodo=$paths[1];
                    }
                    $this->getController($metodo, $controlador);
            }
            //ver el video nuevo y entenderlo ya que al escribir usuario no sabemos como llegar a user controller.
                if($estado==false){
                    die("error en la ruta");
                }
            }
        }
    }
    public function getController($metodo,$controlador){
        $metodoController="";
        //comprobamos si es index o no el metodo o funcion del controlador
        if($metodo=="index"||$metodo==""){
            $metodoController="index";
            
        }else{
            $metodoController=$metodo;
        }
        //incluimos el controlador
        $this->incluirControlador($controlador);
        //comprobamos si la clase existe
        if(class_exists($controlador)){
            //si existe creamos una clase temporal en base a la variablecontrolador=(principalcontroller)
            //$clase=new principalcontroller();
            $classtemp=new $controlador();
            //comprobamos si se puede llamar a la funcion de esa clase
            if(is_callable(array($classtemp,$metodoController))){
                //hacemos una llamada al metodo de esa clase
                //clase->index();
                $classtemp->$metodoController();
            }else {
                die("no existe el metodo");
            }
        }else {
            die("error peeee ctm");
        }
    }
    public function incluirControlador($controlador){
        //validando si existe el archivo o no
        if(file_exists(APLICACION_RUTA."controlador/".$controlador.".php")){
            //si existe lo  incluimos
            include APLICACION_RUTA."controlador/".$controlador.".php";
        }else{
            die("error al encontrar el archivo");
        }
    }
}
