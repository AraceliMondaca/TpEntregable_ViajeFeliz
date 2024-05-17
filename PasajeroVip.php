<?php 
class PasajeroVip extends Pasajero{
private $numViajeroFrecuente;
private $cantMillas;

  public function __construct($nombre, $apellido, $numeroDocumento, $telefono,$numeroAsiento,$numTicket,$numViajeroFrecuente,$cantMillas) {
    parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$numeroAsiento,$numTicket);
    $this->numViajeroFrecuente = $numViajeroFrecuente;
    $this->cantMillas = $cantMillas;
  }  

public function getNumViajeroFrecuente(){
return $this->numViajeroFrecuente;
}
public function setNumViajeroFrecuente($numViajeroFrecuente){
$this->numViajeroFrecuente = $numViajeroFrecuente;
}

public function getCantMillas(){
return $this->cantMillas;
}
public function setCantMillas($cantMillas){
$this->cantMillas = $cantMillas;
}

public function darPorcentajeIncremento(){
  $porcentaje = parent::darPorcentajeIncremento();
  if ($this->getCantMillas() > 300) {
      $porcentaje = $porcentaje + 35;
  } else {
      $porcentaje = $porcentaje + 30;
  }
  return $porcentaje;
}

public function __toString() {
    $inf= parent::__toString()."\n". 
    "Numero de Viajero Frecuente: ".$this->getNumViajeroFrecuente().
    "\n"."Cantidad de Millas: ".$this->getCantMillas();
    return $inf;
}

}
?>
