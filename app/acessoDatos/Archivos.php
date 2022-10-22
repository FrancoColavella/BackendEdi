<?php 

class Archivos{

   
    public static function leerArchivo($nombre){
        //r
        $salida ="";
        $arch = fopen($nombre,'r');

        while (!feof($arch)){

            $salida .= fgets($arch);
        }
        

        fclose($arch);

        return $salida ;

    }

}