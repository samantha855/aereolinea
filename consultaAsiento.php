<?php
  sleep(1);
  $conexion = new mysqli("localhost","root","12345678","aereopuerto");
  $estado = $conexion->query("SELECT * FROM avion") or die("Error");
  $cadena = "[{";  // [{  "a1":1,"a2":0 }]   arreglo de tipo clave:valor
  //Como solo hay unas llaves el indice del arrglo es 0
  for($i=0;$i<12;$i++){  //$i=0/1
	$mEstado = $estado->fetch_array();//fetch, significa ir a buscar.
	$cadena .= '"a'.$mEstado[0].'":'.$mEstado[1];  // asiento disponible
	if($i != 12){                                   //   1        1
		$cadena .= ',';                            //   2        0 
	}
  }
  $cadena .= "}]";
  $conexion->close();
  echo $cadena;
?>