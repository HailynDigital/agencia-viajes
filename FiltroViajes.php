<?php
class FiltroViajes {
    public $hotel;
    public $ciudad;
    public $pais;
    public $fecha;
    public $duracion;

    public function __construct($hotel, $ciudad, $pais, $fecha, $duracion) {
        $this->hotel = $hotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fecha = $fecha;
        $this->duracion = $duracion;
    }

    public function mostrarDetalles() {
        return "
            <p><strong>Hotel:</strong> $this->hotel</p>
            <p><strong>Ubicación:</strong> $this->ciudad, $this->pais</p>
            <p><strong>Fecha de Viaje:</strong> $this->fecha</p>
            <p><strong>Duración:</strong> $this->duracion días</p>
        ";
    }
}
?>
