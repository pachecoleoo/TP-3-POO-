<?php

include_once 'classPasajeroVIP.php';
include_once 'classPasajerosEspeciales.php';
include_once 'classPasajerosEstandares.php';
include_once 'classViaje.php';


// Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
// Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
// Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario

$pasajero1 = new PasajeroEstandar("Leonardo", 1, 101);
$pasajero2 = new PasajeroEstandar("Pancho", 2, 102);
$pasajero3 = new PasajeroEstandar("Fran", 3, 103);

$pasajero4 = new PasajeroEspecial("Pedrito", 4, 104, true, false, true);
$pasajero5 = new PasajeroEspecial("Jauncito", 5, 105, false, false, false);
$pasajero6 = new PasajeroEspecial("Robertito", 6, 106, false, true, false);

$pasajero7 = new PasajeroVIP("Cachito", 7, 107, 1000, 301);
$pasajero8 = new PasajeroVIP("Carlos", 8, 108, 999, 200);
$pasajero9 = new PasajeroVIP("Letis", 9, 109, 999, 300);

$colPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5, $pasajero6, $pasajero7, $pasajero8, $pasajero9];

$objPasajero = new PasajeroEstandar("Vilma", 10, 110);

$viaje1 = new Viaje(100, 0, $colPasajeros, 10);
$viaje1->venderPasaje($objPasajero);
echo $viaje1->costoTotal();
