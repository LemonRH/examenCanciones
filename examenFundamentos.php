<?php

/*
teoria:
DIFERENCIAS ENTRE CLASE Y OBJETO:
    La clase es una plantilla para crear un objeto, en la clase definimos sus atributos y metodos
    El objeto es la instancia de una clase, es su representacion
QUE ES VARIABLE Y METODO
    Variable es un atributo que representa las caracteristicas y propiedades de un objeto
    El metodo es una funcion asociada a una clase que representa las opreaciones que un objeto puede hacer
PUBLIC PRIVATE Y PROTECTED

    public accesible desde cualquier lugar
    private acesibles solo dentro de la misma clase
    protected acesible dentro de la misma clase y clases heredadas

*/


//Ejercicio de herencia 

class Saiyan{
    
    public string $tipo_saiyan = "Saiyan";

    public function __construct(public string $nombre, public int $nivel_pelea){

    }
    
    public function Saludar($texto="Hola soy"){
        return $texto.$this->nombre . PHP_EOL;

    }   
    public function NivelDePelea(){
        return $this->nombre. " tiene un nivel de pelea de: ". $this->nivel_pelea . " y es del tipo: " . $this->tipo_saiyan . PHP_EOL;
    
    }
}

class SuperSaiyan extends Saiyan{

    public string $tipo_saiyan = "Supersaiyan";//esto es un ejemplo para ver que una misma variable usada en la clase padre se puede modificar en la clase hija
    public function Fusion(){
        if ($this->nivel_pelea >999){
            echo $this->nombre . " se puede fusionar, ya que tiene un gran poder" . PHP_EOL;
        }else{
            echo $this->nombre ." no se puede transformar, aun no tiene el suficiente poder" . PHP_EOL; 
        }
    }
    
}
//variables para SAIYAN
$goku = new Saiyan(nombre:"Goku", nivel_pelea:1000);
echo $goku->NivelDePelea();

$vegeta = new Saiyan("Vegeta", 950);
echo $vegeta->NivelDePelea();
//variables para SuperSaiyan

$trunks = new SuperSaiyan("Trunks", 1500);//aunque Supersaiyan sea una subclase necesita q le pases los parametros de la clase padre
echo $trunks->NivelDePelea();
echo $trunks->Fusion();
?>