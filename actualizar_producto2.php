<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

<div align="center" class="titulo_cabecera"><br>
  <br>
LOS PRODUCTOS SE ACTUALIZARON:
<br>
<br>
Podria ser necesario actualizar algunos datos de todos los productos actualizados
<br>
<br>
</div>

<?php

	require_once("manejomysql.php");
	conectar_bd();
	
			
	
//			echo $consulta;
//mysql_query($consulta) or die(header ("Location:registrar_producto.php?error_registro=2"));

include 'PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("formato-productos.xls");

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
	//echo "<br>The worksheet ".$worksheetTitle." has ";
    //echo $nrColumns . ' columns (A-' . $highestColumn . ') ';
    //echo ' and ' . $highestRow . ' row.';
    //echo '<br>Data: <table border="1"><tr>';
    for ($row = 2; $row <= $highestRow; ++ $row) {
        //echo '<tr>';
        //for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow(0,$row);
			$codigo_producto=$cell->getValue();
            $cellCOD = $worksheet->getCellByColumnAndRow(1,$row);
			$nuevo_codigo_producto=$cellCOD->getValue();
            $cell2 = $worksheet->getCellByColumnAndRow(2,$row);
			$name=$cell2->getValue();
            $cell3 = $worksheet->getCellByColumnAndRow(3,$row);
			$nchino=$cell3->getValue();
            $cell4 = $worksheet->getCellByColumnAndRow(4,$row);
			$ningles=$cell4->getValue();
            $cell5 = $worksheet->getCellByColumnAndRow(5,$row);
			$precio=$cell5->getValue();
            $cell6 = $worksheet->getCellByColumnAndRow(6,$row);
			$stock=$cell6->getValue();
            $cell7 = $worksheet->getCellByColumnAndRow(8,$row);
			$marca=$cell7->getValue();
            $cell8 = $worksheet->getCellByColumnAndRow(9,$row);
			$industria=$cell8->getValue();
            $cell9 = $worksheet->getCellByColumnAndRow(10,$row);
			$stock_minimo=$cell9->getValue();
            $cell10 = $worksheet->getCellByColumnAndRow(11,$row);
			$unidad=$cell10->getValue();
            $cell11 = $worksheet->getCellByColumnAndRow(12,$row);
			$observaciones=$cell11->getValue();
			$estado='Activo';
            $cell12 = $worksheet->getCellByColumnAndRow(13,$row);
			$imagen=$cell12->getValue();
            $cell13 = $worksheet->getCellByColumnAndRow(14,$row);
			$Precio_pref=$cell13->getValue();
            $cell14 = $worksheet->getCellByColumnAndRow(15,$row);
			$Precio_Reg=$cell14->getValue();
            $cell15 = $worksheet->getCellByColumnAndRow(16,$row);
			$Precio_Irreg=$cell15->getValue();
		
			$consulta="UPDATE `motos`.`producto` SET `CODIGO_PRODUCTO`='$nuevo_codigo_producto',`NOMBRE_PRODUCTO`='$name',`NOMBRE_CHINO`='$nchino',`NOMBRE_INGLES`='$ningles',`PRECIO_UNITARIO_PROD`=$precio,`STOCK`=$stock,`MARCA`='$marca',`INDUSTRIA`='$industria',
			`STOCK_MINIMO`=$stock_minimo,`UNIDAD`='$unidad',`OBSERVACIONES_PRODUCTO`='$observaciones',`IMAGEN1`='$imagen',`PREFERENCIAL`=$Precio_pref,`REGULAR`=$Precio_Reg,`IRREGULAR`=$Precio_Irreg WHERE `CODIGO_PRODUCTO`='$codigo_producto'";
			
	//echo $consulta;
			
			
			$queryuser = mysql_query("SELECT codigo_producto FROM producto where codigo_producto='$codigo_producto'");
			//echo cuantos_registros_bd($queryuser);
			//echo '<br>';
			
			
			if(cuantos_registros_bd($queryuser) == 0 )
			{	
				echo "El producto: ".$codigo_producto."  no existe en la base de datos, este no fue actualizado<br>";

			}
			else
			{
				//echo $consulta;
				mysql_query($consulta);	
				echo "El producto con codigo: ".$codigo_producto. "  fue actualizado en la base de datos<br>";

			}

			
         //   $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
         //   echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
        //}
        //echo '</tr>';
    }
    //echo '</table>';
}


						

?>



