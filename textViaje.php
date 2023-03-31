<?php

include "Viaje.php";

$viaje = new Viaje('', '', 0);

while (true) {
    echo "SELECCIONE UNA OPCIÓN:\n";
    echo "1. Cargar información del viaje\n";
    echo "2. Modificar información del viaje\n";
    echo "3. Ver información del viaje\n";
    echo "4. Salir\n";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case 1:
            echo "Ingrese el código del viaje:\n";
            $codigo = trim(fgets(STDIN));
            echo "Ingrese el destino del viaje:\n";
            $destino = trim(fgets(STDIN));
            echo "Ingrese la cantidad máxima de pasajeros:\n";
            $cantMaxPasajeros = trim(fgets(STDIN));
            $viaje = new Viaje($codigo, $destino, $cantMaxPasajeros);
            break;

        case 2:
            echo "  SELECCIONE UNA OPCIÓN:\n";
            echo "  1. Modificar código del viaje\n";
            echo "  2. Modificar destino del viaje\n";
            echo "  3. Modificar cantidad máxima de pasajeros\n";
            echo "  4. Agregar pasajero\n";
            echo "  5. Quitar pasajero\n";

            $opcion2 = trim(fgets(STDIN));
            switch ($opcion2) {
                case 1:
                    echo "      Ingrese el nuevo código del viaje:\n";
                    $codigo = trim(fgets(STDIN));
                    $viaje->setCodigo($codigo);
                    break;
                case 2:
                    echo "      Ingrese el nuevo destino del viaje:\n";
                    $destino = trim(fgets(STDIN));
                    $viaje->setDestino($destino);
                    break;
                case 3:
                    echo "      Ingrese la nueva cantidad máxima de pasajeros:\n";
                    $cantMaxPasajeros = trim(fgets(STDIN));
                    $viaje->setCantMaxPasajeros($cantMaxPasajeros);
                    break;
                case 4:
                    
                    echo "      Ingrese el nombre del pasajero:\n";
                    $nombre = trim(fgets(STDIN));
                    echo "      Ingrese el apellido del pasajero:\n";
                    $apellido = trim(fgets(STDIN));
                    echo "      Ingrese el número de documento del pasajero:\n";
                    $numDoc = trim(fgets(STDIN));

                    $agregado = $viaje->agregarPasajero($nombre, $apellido, $numDoc);
                    if ($agregado) {
                            echo "Pasajero agregado correctamente.\n";
                    }
                    
                    else {
                        echo "No se pudo agregar al pasajero. El viaje está completo.\n";
                    }
                    break;
                case 5:
                    echo "Ingrese el número de documento del pasajero a quitar:\n";
                    $numDoc = trim(fgets(STDIN));
                    $quitado = $viaje->quitarPasajero($numDoc);
                    if ($quitado) {
                        echo "Pasajero quitado correctamente.\n";
                    } else {
                        echo "No se pudo quitar al pasajero. El pasajero no existe en el viaje.\n";
                    }
                    break;
                default:
                    echo "Opción inválida.\n";
                    break;
            }
            break;


        case 3:
            echo $viaje;
            break;
            
        case 4:
            echo "Gracias por utilizar el sistema de Viaje Feliz.\n";
            exit();
            break;

    }
}