<?php

include_once 'classPasajerosEstandares.php';
// Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
// Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima de pasajeros y falso caso contrario
class Viaje
{
    private $costoViaje;
    private $sumaCosto;
    private $colPasajeros;
    private $cupo;

    public function __construct($costoViaje, $sumaCosto, array $colPasajeros, $cupo)
    {
        $this->costoViaje = $costoViaje;
        $this->sumaCosto = $sumaCosto;
        $this->colPasajeros = $colPasajeros;
        $this->cupo = $cupo;
    }


    public function venderPasaje($objPasajero)
    {

        $costoViaje = $this->getCostoViaje();


        if ($this->hayPasajesDisponible()) {
            $porcentaje = $objPasajero->darPorcentajeIncremento();
            $incremento = $porcentaje * $costoViaje / 100;
            $costoUnPasaje = $incremento + $costoViaje;

            $pasajeros = $this->getColPasajeros();
            $pasajeros[] = $objPasajero;
            $this->setColPasajeros($pasajeros);

            $costoTotal = $costoUnPasaje + $this->getSumaCosto();
            $this->setSumaCosto($costoTotal);
        }
    }


    //     public function costoTotal()
    //     {
    //         $pasajerosTotales = count($this->getColPasajeros());
    //         $pasajeros = $this->getColPasajeros();
    //         $i = 0;
    //         $costoViaje = $this->getCostoViaje();
    //         $costoTotal = 0;


    //         while ($i < $pasajerosTotales) {

    //             $pasajero = $pasajeros[$i];
    //             $porcentaje = $pasajero->darPorcentajeIncremento();
    //             $costoUnPasaje = $porcentaje * $costoViaje / 100;
    //             $costoTotal = $costoTotal + $costoUnPasaje;
    //             $i++;
    //         }
    //         $costoFinal =  $this->setSumaCosto($costoTotal);

    //         return $costoFinal;
    //     }
    // // 
    public function costoTotal()
    {
        $pasajeros = $this->getColPasajeros();
        $costoTotal = 0;

        foreach ($pasajeros as $pasajero) {
            $porcentaje = $pasajero->darPorcentajeIncremento();
            $incremento = $porcentaje * $this->getCostoViaje() / 100;
            $costoUnPasaje = $incremento + $this->getCostoViaje();
            $costoTotal += $costoUnPasaje;
        }

        $this->setSumaCosto($costoTotal);
    }

    public function hayPasajesDisponible()
    {
        $cantPasajeros = count($this->getColPasajeros());

        if ($cantPasajeros < $this->getCupo()) {
            $rta = true;
        } else
            $rta = false;

        return $rta;
    }

    /**
     * Get the value of costoViaje
     */
    public function getCostoViaje()
    {
        return $this->costoViaje;
    }

    /**
     * Set the value of costoViaje
     *
     * @return  self
     */
    public function setCostoViaje($costoViaje)
    {
        $this->costoViaje = $costoViaje;
    }

    /**
     * Get the value of sumaCosto
     */
    public function getSumaCosto()
    {
        return $this->sumaCosto;
    }

    /**
     * Set the value of sumaCosto
     *
     * @return  self
     */
    public function setSumaCosto($sumaCosto)
    {
        $this->sumaCosto = $sumaCosto;
    }

    /**
     * Get the value of colPasajeros
     */
    public function getColPasajeros()
    {
        return $this->colPasajeros;
    }

    /**
     * Set the value of colPasajeros
     *
     * @return  self
     */
    public function setColPasajeros($colPasajeros)
    {
        $this->colPasajeros = $colPasajeros;
    }


    /**
     * Get the value of cupo
     */
    public function getCupo()
    {
        return $this->cupo;
    }

    /**
     * Set the value of cupo
     *
     * @return  self
     */
    public function setCupo($cupo)
    {
        $this->cupo = $cupo;
    }

    public function mostrarArray($array)
    {
        $cadena = "";
        $i = 1;
        foreach ($array as $atributo) {
            $cadena .= "Pasajero $i: \n";
            $cadena .= $atributo . "\n";
            $i++;
        }

        return $cadena;
    }

    public function __toString()
    {
        $cadena = "";
        $cadena .= "\nLista de pasajeros: " . $this->mostrarArray($this->getColPasajeros()) . "\n";
        $cadena .= "Costo Viaje: " . $this->getCostoViaje() . "\n";
        $cadena .= "Cupo de pasajeros: " . $this->getCupo() . "\n";
        $cadena .= "Costo total: " . $this->getSumaCosto() . "\n";
        return $cadena;
    }
}
