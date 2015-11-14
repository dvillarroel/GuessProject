<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

<body background="body2.jpg">

<div align="center" class="titulo_cabecera"><br>
  <br>
EL STOCK DE PRODUCTOS FUE ACTUALIZADO:
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

include 'excel_reader.php';     // include the class

// creates an object instance of the class, and read the excel file data
$excel = new PhpExcelReader;
$excel->read('formato-productos.xls');

function sheetSave($sheet){
	$x1 = 2;
	
	while ($x1 <= $sheet['numRows'])
	{
			$codigo_producto=isset($sheet['cells'][$x1][1]) ? $sheet['cells'][$x1][1] : '';
			$nuevo_codigo_producto=isset($sheet['cells'][$x1][2]) ? $sheet['cells'][$x1][2] : '';
			$adicionarStock=isset($sheet['cells'][$x1][6]) ? $sheet['cells'][$x1][6] : '';
			$name=isset($sheet['cells'][$x1][3]) ? $sheet['cells'][$x1][3] : '';
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

						
	//echo $consulta;
			
			
			$queryuser = mysql_query("SELECT codigo_producto, stock FROM producto where codigo_producto='$codigo_producto'");
			//echo cuantos_registros_bd($queryuser);
			//echo '<br>';
			
			
			if(cuantos_registros_bd($queryuser) == 0 )
			{	
				echo "El producto: ".$codigo_producto."  no existe en la base de datos, stock no fue actualizado";

			}
			else
			{
				//echo $consulta;
				$resultado= sacar_registro_bd($queryuser);
				$nuevoStock=$resultado['stock']+$adicionarStock;
				$consulta="UPDATE `motos`.`producto` SET `STOCK`=$nuevoStock WHERE `CODIGO_PRODUCTO`='$codigo_producto'";

				mysql_query($consulta);	
				echo "El producto con codigo: ".$codigo_producto. "  fue actualizado en la base de datos, el stock anterior era:".$resultado['stock']." , el nuevo stock es:".$nuevoStock;
			}
			echo '<br>';
			$x1++;
	}
	
}

$nr_sheets = count($excel->sheets);       // gets the number of sheets

// traverses the number of sheets and sets html table with each sheet data in $excel_data
for($i=0; $i<$nr_sheets; $i++) {
	sheetSave($excel->sheets[$i]);
}

?>
<br>
  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>


