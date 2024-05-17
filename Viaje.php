<?php 
class Viaje{

   private $codigoViaje;
   private $destino;
   private $cantidadPasajero;
   private $objColPasajero;
   private $objPersonaResp;

   public function __construct($codigoViaje,$destino,$cantidadPasajero,$objColPasajero,$objPersonaResp){
$this->codigoViaje=$codigoViaje;
$this->destino=$destino;
$this->cantidadPasajero=$cantidadPasajero;
$this->objColPasajero=$objColPasajero;
$this->objPersonaResp=$objPersonaResp;
   }
public function getCodigoViaje(){
    return $this->codigoViaje;
}
public function getDestino(){
    return $this->destino;
}
public function getCantidadPasajero(){
    return $this->cantidadPasajero;
}
public function getObjColPasajero(){
    return $this->objColPasajero;
}
public function getObjPersonaResp(){
    return $this->objPersonaResp;
 }
public function setCodigoViaje($codigoViaje){
    $this->codigoViaje=$codigoViaje;
}
public function setDestino($destino){
    $this->destino=$destino;
} 
public function setCantidadPasajero($cantidadPasajero){
    $this->cantidadPasajero=$cantidadPasajero;
}  
public function setObjColPasajero($objColPasajero){
    $this->objColPasajero=$objColPasajero;
}
public function setObjPersonaResp($objPersonaResp){
    $this->objPersonaResp=$objPersonaResp;
}


public function agregarPasajero(pasajero $pasajero){
    $pasajeros = $this->getObjColPasajero();
$existe=false;
   if (!in_array($pasajero, $pasajeros, true)) {
        $pasajeros[] = $pasajero;
        $this->setObjColPasajero($pasajeros);

        $existe= true;
    }

    return $existe; 
}



public function hayPasajesDisponible() {
    $res = true;
    if ($this->getCantidadPasajero() <= (count($this->getObjColPasajero()))) {
        $res = false;
    }
    return $res;
}

public function venderPasaje(Pasajero $Pasajero){
    $pasaje = false;
    $i=0;
$pasajeroE=$this->hayPasajesDisponible();
    if ($pasajeroE) {
        $pasaje = false;
    } else {
        $this->objColPasajero[$i] = $Pasajero;
        $pasaje = true;
    }
    $i++;
    return $pasaje;
}



public function eliminarPasajero($pasajero){
    $eliminado=false;
    if (in_array($pasajero,$this->getObjColPasajero())) {
        $key =array_search($pasajero, $this->getObjColPasajero());
        array_splice($this->getObjColPasajero(),$key,1);
        $this->getCantidadPasajero()-1;
        $eliminado=true;
    }
    return $eliminado;
}

public function cambiaDatosPasajeros($pasajero, $otroPasajero){
    $cambio=false;
    if (in_array($pasajero,$this->getObjColPasajero())) {
        $key =array_search($pasajero, $this->getObjColPasajero());
        $this->objColPasajero[$key]=$otroPasajero;
        $cambio=true;
    }
    return $cambio;
}

 
    


public function mostrarPasajero(){
    $mostrarPasajero=[];
    //$i=0;
    $objPasajero = $this->getObjColPasajero();
    foreach ($objPasajero as $key => $value){
        $mostrarPasajero[]=[
        'nombre' => $value['nombre'],
        'apellido' => $value['apellido'],
        'dni' => $value['DNI'],
        'telefono' => $value['telefono'],
        'asiento'=>$value['asiento'],
        'ticket'=>$value['ticket']];
       //$mostrarPasajero[$i]=array("nombre"=>$nombre,"apellido"=>$apellido,"DNI"=>$dni,"telefono"=>$telefono,"asiento"=>$asiento,"ticket"=>$ticket);    
    }
   // $i++;
   
    return $mostrarPasajero;
   
}



public function __toString(){
    $lista=print_r($this->getObjColPasajero());
    //$lista=$this->mostrarPasajero();
    $viaje="                 !DATOS DEL VIAJE! \n". 
    "Codigo del Viaje: ".$this->getCodigoViaje() ."\n". 
    "Destino: ".$this->getDestino(). "\n".
    "Lista de Pasajeros: " .$lista."\n".
    "\n".$this->getObjPersonaResp()."\n";
    return $viaje;
       }
      
}
