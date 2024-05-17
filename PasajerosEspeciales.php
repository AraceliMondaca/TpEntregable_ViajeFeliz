<?php 
class PasajerosEspeciales extends Pasajero{
private $servicioEspeciales;
private $asistenciaEmbarque;
private $comidaEspeciales;

   
public function __construct($nombre, $apellido, $numeroDocumento, $telefono,$numeroAsiento, $numTicket, $servicioEspeciales, $asistenciaEmbarque, $comidaEspeciales){
    parent::__construct($nombre,$apellido,$numeroDocumento,$telefono,$numeroAsiento,$numTicket);
    $this->servicioEspeciales = $servicioEspeciales;
    $this->asistenciaEmbarque=$asistenciaEmbarque;
    $this->comidaEspeciales=$comidaEspeciales;
}

public function getServicioEspeciales(){
return $this->servicioEspeciales;
}

public function setServicioEspeciales($servicioEspeciales){
$this->servicioEspeciales = $servicioEspeciales;
}

public function getAsistenciaEmbarque()
{
return $this->asistenciaEmbarque;
}

public function setAsistenciaEmbarque($asistenciaEmbarque){
$this->asistenciaEmbarque = $asistenciaEmbarque;
}

public function getComidaEspeciales(){
return $this->comidaEspeciales;
}

public function setComidaEspeciales($comidaEspeciales){
$this->comidaEspeciales = $comidaEspeciales;
}

public function darPorcentajeIncremento(){
    $porcentaje=parent::darPorcentajeIncremento();
    $servicio=$this->getServicioEspeciales();
    $servicio1=$this->getAsistenciaEmbarque();
    $servicio2=$this->getComidaEspeciales();
if ($servicio=="si"&&$servicio1=="si"&&$servicio2=="si") {
        $porcentaje=$porcentaje*30;
    }elseif($servicio=="si"){
    $porcentaje=$porcentaje*15;
   }elseif($servicio1=="si"){
    $porcentaje=$porcentaje*15;
  }elseif($servicio2=="si"){
    $porcentaje=$porcentaje*15;
   }
    return $porcentaje;
}

public function __toString(){
    $info= parent::__toString()."\n".
    "Servicios Especiales: ".$this->getServicioEspeciales()."\n". 
    "Asistencia de Embarque: ".$this->getAsistenciaEmbarque()."\n". 
    "comida: ".$this->getComidaEspeciales()."\n";
    return $info;
}
}
?>
