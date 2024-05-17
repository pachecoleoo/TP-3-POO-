<?php
include_once 'classPasajerosEstandares.php';

// La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias. 
class PasajeroEspecial extends PasajeroEstandar
{
    private $silla;
    private $asistencia;
    private $comida;

    public function __construct($nombre, $numAsiento, $numTicket, $silla, $asistencia, $comida)
    {
        parent::__construct($nombre, $numAsiento, $numTicket);
        $this->silla = $silla;
        $this->asistencia = $asistencia;
        $this->$comida = $comida;
    }

    /**
     * Get the value of comida
     */
    public function getComida()
    {
        return $this->comida;
    }

    /**
     * Set the value of comida
     *
     * @return  self
     */
    public function setComida($comida)
    {
        $this->comida = $comida;
    }

    /**
     * Get the value of asistencia
     */
    public function getAsistencia()
    {
        return $this->asistencia;
    }

    /**
     * Set the value of asistencia
     *
     * @return  self
     */
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    }

    /**
     * Get the value of silla
     */
    public function getSilla()
    {
        return $this->silla;
    }

    /**
     * Set the value of silla
     *
     * @return  self
     */
    public function setSilla($silla)
    {
        $this->silla = $silla;
    }

    // Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
    public function darPorcentajeIncremento()
    {
        $diezPorcientoBase = parent::darPorcentajeIncremento();
        $silla = $this->getSilla();
        $asistencia = $this->getAsistencia();
        $comida = $this->getComida();

        if ($silla && $asistencia && $comida) {
            $porcentaje =  $diezPorcientoBase + 20;
        } elseif ($silla || $comida || $asistencia) {
            $porcentaje = $diezPorcientoBase + 5;
        } else $porcentaje = 0;
        return $porcentaje;
    }

    public function __toString()
    {
        $cadena = "";
        $cadena .= parent::__toString() . "\n";
        $cadena .= "Silla especial: " . $this->getSilla() . "\n";
        $cadena .= "Asistencia especial: " . $this->getAsistencia() . "\n";
        $cadena .= "Comida especial: " . $this->getComida() . "\n";

        return $cadena;
    }
}
