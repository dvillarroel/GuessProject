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
            $cell6 = $worksheet->getCellByColumnAndRow(6,$row);
			$stock=$cell6->getValue();
            $cell15 = $worksheet->getCellByColumnAndRow(7,$row);
			$adicionarStock=$cell15->getValue();

			
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
	}
	
}

?>
<br>
  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>


