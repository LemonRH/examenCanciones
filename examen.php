<?php

// canciones duracion autor genero enum nombrecancion
//registrar 6 canciones
//procesos devolver canciones segun autor, funcion que devuelva la cancion más larga 

//SOLUCION 1------------------------------------------------------------------------------
class Cancion{

    //variables necesarias en la clase cancion (propiedades)
    public $duracion;
    public $autor;
    public $genero;//DEBERIA ser un ENUM
    public $nombre;
    public static $canciones = [];// creo esta variable ESTATICA para almacenar TODAS las canciones

    public function __construct($duracion, $autor, $genero, $nombre){ //constructor (no hay necesidad de getters ya que la funcion es publica)

        $this->duracion = $duracion;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->nombre = $nombre;
        self::$canciones[]= $this; //con esto guardamos la cancion en una lista de canciones


        
    }
    //metodo/funcion ESTATICO para buscar las canciones cuando le damos un $autor
    public static function cancionesAutor($autor){
        $cancionesAutor = [];//creamos un array para guardar las cnaciones de autor
        foreach (self::$canciones as $cancion){//bucle que recorre todas las canciones
            if($cancion->autor===$autor){
                $cancionesAutor[]= $cancion->nombre; //añade el nombre de la cancion al array si el autor que pasamos (paco) coincide con el autor de la cancion que recorremos en el bucle
            }
        }
        return $cancionesAutor;//devuelve el array, con las canciones que coincidieron

    }
    
    public static function cancionMasLarga(){

        $cancionMasLarga=null;//aqui guardaremos la cancion más larga
        $duracionMax =0;//variable que nos facilitará comparar la duracion de las canciones

        foreach(self::$canciones as $cancion){ //bucle para recorrer todas las canciones
            if ($cancion->duracion >$duracionMax){ //si la duracion de la cancion es mayor que $duracionMax, cambiamos su valor y guardamos su nombre en $cancionMasLrga
            $cancionMasLarga = $cancion;
            $duracionMax = $cancion->duracion;
            }
        }
    return $cancionMasLarga;

    }
}

//añadiendo canciones
new Cancion('500','paco','pop','entre dos aguas');
new Cancion('400', 'paco', 'rock', 'Bohemian Rhapsody');
new Cancion('300', 'maria', 'pop', 'Shape of You');
//llamamos al metodo estatico (cancionesAutor), pasandole "paco" como autor que necesitamos encontrar
$cancionesDePaco = Cancion::cancionesAutor('paco');//array de canciones de paco
print_r($cancionesDePaco); //echo de forma recursiva para imprimir el array


//llamada metodo estatico cancionmaslarga...
$cancionLarga = Cancion::cancionMasLarga();
echo "la cancion mas alrga es: ", $cancionLarga->nombre, " y dura: ", $cancionLarga->duracion, "segundos";


//SOLUCION 2 ---------------------------------------------------------------------------------------------------------------------
/*
 class Cancion {
    public $nombre;
    public $duracion;
    public $autor;
    public $genero;

    public function __construct($nombre, $duracion, $autor, $genero) {
        $this->nombre = $nombre;
        $this->duracion = $duracion;
        $this->autor = $autor;
        $this->genero = $genero;
    }
}

class BibliotecaCanciones {
    private $canciones = [];

    public function agregarCancion($nombre, $duracion, $autor, $genero) {
        $cancion = new Cancion($nombre, $duracion, $autor, $genero);
        $this->canciones[] = $cancion;
    }

    public function cancionesPorAutor($autor) {
        $cancionesAutor = [];
        foreach ($this->canciones as $cancion) {
            if ($cancion->autor === $autor) {
                $cancionesAutor[] = $cancion;
            }
        }
        return $cancionesAutor;
    }

    public function cancionMasLarga() {
        $cancionMasLarga = null;
        $duracionMasLarga = 0;
        foreach ($this->canciones as $cancion) {
            if ($cancion->duracion > $duracionMasLarga) {
                $cancionMasLarga = $cancion;
                $duracionMasLarga = $cancion->duracion;
            }
        }
        return $cancionMasLarga;
    }

    public function cancionesMasDe5Minutos() {
        $canciones5Min = [];
        foreach ($this->canciones as $cancion) {
            if ($cancion->duracion > 5) {
                $canciones5Min[] = $cancion;
            }
        }
        return $canciones5Min;
    }
}

$biblioteca = new BibliotecaCanciones();
$biblioteca->agregarCancion("Cancion1", 4.5, "Autor1", "Rock");
$biblioteca->agregarCancion("Cancion2", 6, "Autor2", "Pop");
$biblioteca->agregarCancion("Cancion3", 3, "Autor1", "Jazz");
$biblioteca->agregarCancion("Cancion4", 5.5, "Autor3", "Electrónica");
$biblioteca->agregarCancion("Cancion5", 7, "Autor2", "Reggae");
$biblioteca->agregarCancion("Cancion6", 4.2, "Autor3", "Pop");

$cancionesAutor1 = $biblioteca->cancionesPorAutor("Autor1");
$cancionMasLarga = $biblioteca->cancionMasLarga();
$cancionesMasDe5Min = $biblioteca->cancionesMasDe5Minutos();

// Puedes imprimir o trabajar con estos datos como necesites
 */
?>