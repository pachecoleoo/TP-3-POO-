<?php
include_once 'classViaje.php';
// La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje.


class PasajeroEstandar
{
    private $nombre;
    private $numAsiento;
    private $numTicket;

    public function __construct($nombre, $numAsiento, $numTicket)
    {
        $this->nombre = $nombre;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of numAsiento
     */
    public function getNumAsiento()
    {
        return $this->numAsiento;
    }

    /**
     * Set the value of numAsiento
     *
     * @return  self
     */
    public function setNumAsiento($numAsiento)
    {
        $this->numAsiento = $numAsiento;
    }

    /**
     * Get the value of numTicket
     */
    public function getNumTicket()
    {
        return $this->numTicket;
    }

    /**
     * Set the value of numTicket
     *
     * @return  self
     */
    public function setNumTicket($numTicket)
    {
        $this->numTicket = $numTicket;
    }


    public function darPorcentajeIncremento()
    {
        $porcentaje = 10; //porcentaje de incremento

        return $porcentaje;
    }


    public function __toString()
    {
        $cadena = "";
        $cadena .= "Nombre pasajero: " . $this->getNombre() . "\n";
        $cadena .= "Numero de asiento: " . $this->getNumAsiento() . "\n";
        $cadena .= "Numero de ticket: " . $this->getNumTicket() . "\n";

        return $cadena;
    }
}
