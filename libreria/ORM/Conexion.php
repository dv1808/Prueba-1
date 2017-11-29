<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * PHP FILE
 */
class Conexion{
    /*
     * static: para llamarlo estaticamente 
     * new PDO: nueva instancia de PDO el cual 
     * contiene los paramatros de conexion
     * return $conexion: cuando se ejecute la funcion conectar
     * es necesario que se retorne la conexion
     * try/catch: manejo de errores
     */
    public static function conectar(){
        try{
          $conexion=new PDO("mysql:host=".HOST.";dbname=".DB,USER,PASSWORD);
          return $conexion;  
        } catch (PDOException $error){
            // operador ->: para llamar al metodo
          //  echo $error->getMessage();
        }
    }
}
 
//se llama al metodo conectar y al ser estatico la sintaxys es la siguiente:
//Conexion::conectar(); 