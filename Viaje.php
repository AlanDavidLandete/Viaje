<?php

/*La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa almacenar el código del mismo, destino, 
cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.*/

class Viaje{

    // ATRIBUTOS DE LA CLASE VIAJE
private $codigo;
private $destino;
private $cantMaxPasajeros;
private $datosPasajeros;

/**
 * CONSTRUCTOR DE VIAJE
 */
public function __construct($codigo, $destino, $cantMaxPasajeros){
    $this-> codigo = $codigo;
    $this-> destino = $destino;
    $this-> cantMaxPasajeros = $cantMaxPasajeros;
    $this-> datosPasajeros = [];
}

/**
 * Retorna el código de viaje
 */
public function getCodigo(){
    return $this-> codigo;
}

/**
 * Setea el código de viaje
 */
public function setCodigo($codigo){
    $this-> codigo = $codigo;
}

/**
 * Retorna el destino del viaje
 */
public function getDestino(){
    return $this->destino;
}

/**
 * Setea el destino del viaje
 */
public function setDestino($destino){
    $this->destino = $destino;
}

/**
 * Retorna la cantidad máxima de pasajeros por viaje
 */
public function getCantMaxPasajeros(){
    return $this-> cantMaxPasajeros;
}

/**
 * Setea la cantidad máxima de pasajeros por viaje
 */
public function setCantMaxPasajeros($cantMaxPasajeros){
    $this-> cantMaxPasajeros = $cantMaxPasajeros;
}

/**
 * Retorna los datos de los pasajeros
 */
public function getDatosPasajeros(){
    return $this-> datosPasajeros;
}

/**
 * Agrega un pasajero al viaje
 */
public function agregarPasajero($nombre, $apellido, $numDoc){
    if(count($this->datosPasajeros) < $this->cantMaxPasajeros){
        $pasajero = [
            "nombre" => $nombre,
            "apellido" => $apellido,
            "numDoc" => $numDoc
        ];
        array_push($this->datosPasajeros, $pasajero);
        return true;
    } else {
        return false;
    } 
}

/**
 * Elimina un pasajero del viaje
 */
public function quitarPasajero($numDoc){
   $encontrado = false;
   for ($i = 0; $i < count($this->datosPasajeros); $i++){
       if ($this-> datosPasajeros[$i]["numDoc"] == $numDoc){
       array_splice($this->datosPasajeros, $i, 1);
       $encontrado = true;
       break;
    }
   } 
   return $encontrado;
}

/**
 * Modifica los datos de un pasajero del viaje
 */
  public function modificarPasajero($indice, $nombre, $apellido, $numDoc) {
    $this->datosPasajeros[$indice]["nombre"] = $nombre;
    $this->datosPasajeros[$indice]["apellido"] = $apellido;
    $this->datosPasajeros[$indice]["numDoc"] = $numDoc;
  }

/**
 * Retorna un string de lo que quiera visualizar
 */
  public function __toString(){
    $pasajeros = "";
    foreach ($this->datosPasajeros as $pasajero){
        $pasajeros .= $pasajero['nombre'] . " " . $pasajero['apellido'] . " (" . $pasajero['numDoc'] . ")\n";
    }

    return "Código de viaje: " . $this->codigo . "\n" .
           "Destino: " . $this->destino . "\n" .
           "Cantidad máxima de pasajeros: " . $this->cantMaxPasajeros . "\n" .
           "Pasajeros:\n" . $pasajeros;
         ;
  }


}