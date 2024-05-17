<?php
include_once 'Pasajero.php';
include_once ('PasajeroVip.php');
include_once ('PasajerosEspeciales.php');
include_once 'ResponsableV.php';
include_once 'Viaje.php';


echo "                      ¡MENU DEL VIAJE!                      \n";
echo"Ingrese destino:\n";
$destino=trim(fgets(STDIN));
echo"Ingrese codigo del viaje:\n";
$codViaje=trim(fgets(STDIN));
echo "ingrese cantidad de pasajes totales:\n";
$cantidadPasajero=trim(fgets(STDIN));

$Objpasajero=new Pasajero(" "," ",null,null,null,null);
$Objpasajero1=new Pasajero("Ana","Rosa",43391007,47567987,20,12);
$Objpasajero2=new Pasajero("Amiel","Valencia",181028223,2995643768,18,07);
$Objpasajero3=new Pasajero("liza","Mont",32763512,154024225,22,02);
$Colpasajeros=[$Objpasajero1,$Objpasajero2,$Objpasajero3];


$ObjperResponsable=new ResponsableV(0045,1807,"sol","estrella");
$ObjViaje=new Viaje($codViaje,$destino,$cantidadPasajero,$Colpasajeros,$ObjperResponsable);

function menu()
{
      $menu= "____________________________________________________________________________________________\n"."\n".
     "                                    OPCIONES                \n".
     "                     Opcion 1 Agregar pasajero:\n".
     "                     Opcion 2 Modificar el destino del viaje:\n".
     "                     Opcion 3 Modificar pasajero:\n".
     "                     Opcion 4 Quitar pasajero:\n".
     "                     Opcion 5 Modificar la cantidad de asientos del viaje:\n".
     "                     Opcion 6 Modificar el codigo del viaje:\n".
     "                     Opcion 7 Ver Viaje:\n".
     "                     Opcion 8 Ver datos de Persona Responsable:\n".
     "                     Opcion 9 Modificar datos de Persona Responsable:\n".
     "                     Opcion 10 salir.\n".
     "\n____________________________________________________________________________________________ \n";
     return $menu;
}

function recogerDatos(){
    echo"Nombre: ";
    $nombre=trim(fgets(STDIN))."\n";
    echo"Apellido: ";
    $apellido=trim(fgets(STDIN))."\n";
    echo"DNI: ";
    $dni=strval(trim(fgets(STDIN)))."\n";
    echo "Telefono: ";
    $telefono=trim(fgets(STDIN))."\n";
    echo "Numero de Asiento: ";
    $numeroAsiento=trim(fgets(STDIN))."\n";
    echo "Ticket: ";
    $Ticket=trim(fgets(STDIN))."\n";
     $pasajeroNew=new Pasajero($nombre,$apellido,$dni,$telefono,$numeroAsiento,$Ticket);
     
     if ($numeroAsiento>0&&$numeroAsiento<7) {
        echo "ingrese cantidad de Millas:";
        $millas=trim(fgets(STDIN));
        echo "ingrese el numero de Viaje:";
        $nViaje=trim(fgets(STDIN));
        $pasajero=new PasajeroVip($nViaje,$millas,$nombre,$apellido,$dni,$telefono,$numeroAsiento,$Ticket);
    }elseif($numeroAsiento>7&&$numeroAsiento<13) {
        echo "necesita servicio especial? (si/no)\n";
        $servicioEspecial=trim(fgets(STDIN));
        echo "necesita asistencia? (si/no)\n";
        $asistencia=trim(fgets(STDIN));
        echo "necesita comida especial? (si/no)\n";
        $comidaEspeciales=trim(fgets(STDIN));
        $pasajero=new PasajerosEspeciales ($servicioEspecial,$asistencia,$comidaEspeciales,$nombre,$apellido,$dni,$telefono,$numeroAsiento,$Ticket);
    }else {
        $pasajero=new Pasajero($nombre,$apellido,$dni,$telefono,$numeroAsiento,$Ticket);
    }
    echo "precio: ".$pasajero->darPorcentajeIncremento()+15000 ."\n";
    return $pasajeroNew;
}

$ejecucion=true;
do {
    print menu();
   $opc=trim(fgets(STDIN));
    switch ($opc) {
        case '1':
            if($ObjViaje->hayPasajesDisponible()){
               echo "Ingrese los datos de un pasajero: \n";
               $pasajero = recogerDatos();
                $ObjViaje->venderPasaje($pasajero)? "\nNo se Agrego, el pasajero ya exise" : "\nSe agrego";
                $ObjViaje->agregarPasajero($pasajero);
            }else{
                echo "No hay mas lugare en este viaje.\n";
            }            
            break;
        
        case '2':
        
                echo "El viaje con destino a: {$ObjViaje->getDestino()}. \n";
                echo "Ingrese el nuevo destino: \n";
                $destino = trim(fgets(STDIN));
                $ObjViaje->setDestino($destino);
            
            break;
        
        case '3':
            echo"dni del Pasajero a modificar:\n";
            $dniPasajero=intval(trim(fgets(STDIN)));
            if ($dniPasajero == $Objpasajero->getNumeroDocumento()) {
                echo "Ingrese el nuevo pasajero:\n";
                $pasajero = recogerDatos();
            
                if ($objViaje->cambiaDatosPasajeros($Objpasajero, $pasajero)) {
                    echo "Se modificaron los datos correctamente.\n";
                } else {
                    echo "Pasajero no identificado.\n";
                }
            }
            break;
        case '4':
            echo"Ingrese dni del pasajero a quitar:\n";
            $selecDni=intval(trim(fgets(STDIN)));
            if ($selecDni==$Objpasajero->getNumeroDocumento()) {
                $objViaje->eliminarPasajero($selecDni);
                echo"Pasajero Borrado con exito.\n";
            } else {
                echo"Pasajero no encontrado \n";
            }
            break;
        
        case '5':
            echo "El viaje posee {$ObjViaje->getCantidadPasajero()} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $ObjViaje->setCantidadPasajero($cantidadAsientos);
            break;
        
        case '6':
            echo "El viaje posee {$ObjViaje->getCantidadPasajero()} asientos. \n";
            echo "Ingrese la nueva cantidad de asientos: \n";
            $cantidadAsientos = trim(fgets(STDIN));
            $cantidadAsientos = intval($cantidadAsientos);
            $ObjViaje->setCantidadPasajero($cantidadAsientos);
            break;
        
        case '7':
            echo $ObjViaje->__toString();
            break;

        case '8':
            $ResponsableV=$ObjperResponsable;
            echo $ResponsableV;
            break;

        case '9':
            echo "Modifique los datos del Responsable \n" .
            "Numero de empleado: \n";
            $numEmpleado=trim(fgets(STDIN))."\n";
            echo "Ingrese numero de licencia: \n";
            $numLicencia=trim(fgets(STDIN))."\n";
            echo"Nombre responsable: \n";
            $nombre=trim(fgets(STDIN))."\n";
            echo"Apellido responsable: \n";
            $apellido=trim(fgets(STDIN))."\n";
            $ResponsableV=$ObjperResponsable->setNumEmpleado($numEmpleado);
            $ResponsableV=$ObjperResponsable->setNumLicencia($numLicencia);
            $ResponsableV=$ObjperResponsable->setNombre($nombre);
            $ResponsableV=$ObjperResponsable->setApellido($apellido);
            break;

        default:
        $ejecucion=false;
        break;
    }
} while ($ejecucion == true);
