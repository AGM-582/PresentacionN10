<?php
include '../../conexion.php';
//FALTARÍA CONTEMPLAR UNA INSTRUCCIÓN APARTE PARA EL UPDATE EN LUGAR DE LA SOBREESCRITURA
	$ruta = 'Upload/';	
	foreach ($_FILES as $key) {
		$nombre=$key["name"];
		$ruta_temporal=$key["tmp_name"];		
		$fecha=getdate();
		$nombre_v=$fecha["mday"]."-".$fecha["mon"]."-".$fecha["year"]."_".$fecha["hours"]."-".$fecha["minutes"]."-".$fecha["seconds"].".csv";		
		$destino=$ruta.$nombre_v;
		$explo=explode(".",$nombre);
		if($explo[1] != "csv"){
			$alert=1;
		}else{
			if(move_uploaded_file($ruta_temporal, $destino)){
				$alert=2;
			}
		}
	}
	$x=0;
	$data=array();
	$fichero=fopen($destino, "r");
	while(($datos= fgetcsv($fichero,1000,";")) != FALSE){
		$x++;
		if($x>1){
			//se genera el array según la cantidad de atributos de la tabla a insertar (formato sql)
			$data[]='('.$datos[0].','."'$datos[1]'".','.$datos[2].')';
			
		}
	}
	//acá se crea toda la sentencia de carga de valores, sacado del array que se hizo con todos los datos del archivo
	$insercion = "INSERT INTO carrera VALUES ".implode(",",$data);
	if($con->query($insercion)===TRUE){
		echo "<h2>poner un mensaje de que salió todo ok</h2>";
	}else{
		echo "<h2>decirle que hay un error en el archivo</h2>";
		print_r("<pre>");
		print_r($insercion);
		print_r("</pre>");
	}
	//esto se usó para ver que estaba pasando en cada armado
	/*print_r("<pre>");
	print_r(variable/s);
	print_r("</pre>");*/
	fclose($fichero);
?>