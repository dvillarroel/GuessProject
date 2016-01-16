<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

<div align="center" class="titulo_cabecera"><br>
  <br>
LOS PRODUCTOS SE REGISTRARON CORRECTAMENTE:
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
	echo $worksheetTitle;
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
			$imagen=$cell->getValue().".jpg";
            $cell13 = $worksheet->getCellByColumnAndRow(14,$row);
			$Precio_pref=$cell13->getValue();
            $cell14 = $worksheet->getCellByColumnAndRow(15,$row);
			$Precio_Reg=$cell14->getValue();
            $cell15 = $worksheet->getCellByColumnAndRow(16,$row);
			$Precio_Irreg=$cell15->getValue();
		
			$consulta="insert into producto values('$codigo_producto', '$name', '$nchino','$ningles', $precio,$stock,'$marca','$industria',$stock_minimo, '$unidad','$observaciones', '$estado','$imagen', null, null, null, null,$Precio_pref,$Precio_Reg,$Precio_Irreg);";
	//echo $consulta;
			
			
			$queryuser = mysql_query("SELECT codigo_producto FROM producto where codigo_producto='$codigo_producto'");
			//echo cuantos_registros_bd($queryuser);
			//echo '<br>';
			
			
			if(cuantos_registros_bd($queryuser) == 0 )
			{	
				//echo $consulta;
				mysql_query($consulta);	
				echo "El producto con codigo: ".$codigo_producto. "  fue resgistrado en la base de datos<br>";
		
			}
			else
			{
				echo "El producto: ".$codigo_producto."  ya existe en la base de datos, este no fue registrado<br>";
				
			}

			
         //   $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
         //   echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
        //}
        //echo '</tr>';
    }
    //echo '</table>';
}


/*
include 'excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;
$excel->read('formato-productos.xls');

function sheetSave($sheet){
	$x1 = 2;
	
	while ($x1 <= $sheet['numRows'])
	{
			$codigo_producto=isset($sheet['cells'][$x1][1]) ? $sheet['cells'][$x1][1] : '';
			$name=isset($sheet['cells'][$x1][3]) ? $sheet['cells'][$x1][3] : '';
			echo $name;
			$nchino='';
			$ningles='';
			$precio=isset($sheet['cells'][$x1][4]) ? $sheet['cells'][$x1][4] : '';
			$stock=isset($sheet['cells'][$x1][5]) ? $sheet['cells'][$x1][5] : '';
			$marca=isset($sheet['cells'][$x1][7]) ? $sheet['cells'][$x1][7] : '';
			$industria=isset($sheet['cells'][$x1][8]) ? $sheet['cells'][$x1][8] : '';
			$stock_minimo=isset($sheet['cells'][$x1][9]) ? $sheet['cells'][$x1][9] : '';
			$unidad=isset($sheet['cells'][$x1][10]) ? $sheet['cells'][$x1][10] : '';
			$observaciones=isset($sheet['cells'][$x1][11]) ? $sheet['cells'][$x1][11] : '';
			$estado='Activo';
			$imagen=isset($sheet['cells'][$x1][12]) ? $sheet['cells'][$x1][12] : '';
			$Precio_pref=isset($sheet['cells'][$x1][13]) ? $sheet['cells'][$x1][13] : '';
			$Precio_Reg=isset($sheet['cells'][$x1][14]) ? $sheet['cells'][$x1][14] : '';
			$Precio_Irreg=isset($sheet['cells'][$x1][15]) ? $sheet['cells'][$x1][15] : '';
	
	//$estado='activo';

						

			echo '<br>';
			$x1++;
	}
	
}

$nr_sheets = count($excel->sheets);       // gets the number of sheets

// traverses the number of sheets and sets html table with each sheet data in $excel_data
for($i=0; $i<$nr_sheets; $i++) {
	sheetSave($excel->sheets[$i]);
}
*/
?>



<br>
  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
