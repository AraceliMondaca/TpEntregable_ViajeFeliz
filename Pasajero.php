<?php 
class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;
    private $numeroAsiento;
    private $numTicket;
public function __construct($nombre,$apellido,$numeroDocumento,$telefono,$numeroAsiento,$numTicket){
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->numeroDocumento=$numeroDocumento;
    $this->telefono=$telefono;
    $this-> numeroAsiento=$numeroAsiento;
        $this-> numTicket=$numTicket;
}
public function getNombre() {
    return $this->nombre;
}
public function getApellido(){
    return $this->apellido;
}
public function getNumeroDocumento(){
    return $this->numeroDocumento;
}
public function getTelefono(){
    return $this->telefono;
}
public function setNombre($nombre){
    $this->nombre=$nombre;
}
public function setApellido($apellido){
    $this->apellido=$apellido;
}
public function setNumeroDocumento($numeroDocumento){
    $this->numeroDocumento=$numeroDocumento;
}
public function telefono($telefono){
    $this->telefono=$telefono;
}
public function getNumeroAsiento()
{
    return $this->numeroAsiento;
}
public function setNumeroAsiento($numeroAsiento){
    $this->numeroAsiento = $numeroAsiento;
}
public function getNumTicket(){
    return $this->numTicket;
}
public function setNumTicket($numTicket){
    $this->numTicket = $numTicket;
}

public function darPorcentajeIncremento(){
    $porcentaje=(100/1)*10;
    return $porcentaje;
}
public function __toString(){
    
    $pasajeros= "PASAJERO: \n".
    "nombre: ".$this->getNombre()."\n". 
    "apellido: ".$this->getApellido()."\n". 
    "Numero de documento: ".$this->getNumeroDocumento() ."\n". 
    "Numero de Asiento :".$this->getNumeroAsiento(). "\n".
    "Numero de Ticket: ".$this->getNumTicket()."\n";
    return $pasajeros;
}
    

    

}
