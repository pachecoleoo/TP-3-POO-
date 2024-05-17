<?php
include_once 'classPasajerosEstandares.php';

//La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero.



class PasajeroVIP extends PasajeroEstandar
{
    private $numViajeroFrecuente;
    private $cantMillas;

    public function __construct($nombre, $numAsiento, $numTicket, $numViajeroFrecuente, $cantMillas)
    {
        parent::__construct($nombre, $numAsiento, $numTicket);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }

    /**
     * Get the value of numViajeroFrecuente
     */
    public function getNumViajeroFrecuente()
    {
        return $this->numViajeroFrecuente;
    }

    /**
     * Set the value of numViajeroFrecuente
     *
     * @return  self
     */
    public function setNumViajeroFrecuente($numViajeroFrecuente)
    {
        $this->numViajeroFrecuente = $numViajeroFrecuente;
    }

    /**
     * Get the value of cantMillas
     */
    public function getCantMillas()
    {
        return $this->cantMillas;
    }

    /**
     * Set the value of cantMillas
     *
     * @return  self
     */
    public function setCantMillas($cantMillas)
    {
        $this->cantMillas = $cantMillas;
    }

    // Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.

    public function darPorcentajeIncremento()
    {
        $diezPorcientoBase = parent::darPorcentajeIncremento();
        if ($this->getCantMillas() > 300) {
            $porcentaje = $diezPorcientoBase + 20;
        } else {
            $porcentaje = $diezPorcientoBase + 25;
        }

        return $porcentaje;
    }

    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString();
        $cadena .= "Numero de viajero frecuente: " . $this->getNumViajeroFrecuente() . "\n";
        $cadena .= "Cantidad de Millas: " . $this->getCantMillas() . "\n";
        return $cadena;
    }
}
