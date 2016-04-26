<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/jquery.dataTables.min.js"></script>

    <script src="docs/js/metro.js"></script>

    <style>
        html, body {
            height: 100%;
        }
        body {
        }
        .page-content {
            padding-top: 3.125rem;
            min-height: 100%;
            height: 100%;
        }
        .table .input-control.checkbox {
            line-height: 1;
            min-height: 0;
            height: auto;
        }

        @media screen and (max-width: 800px){
            #cell-sidebar {
                flex-basis: 52px;
            }
            #cell-content {
                flex-basis: calc(100% - 52px);
            }
        }
    </style>

    <script>
        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
    </script>
</head>
<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Actualizacion de Productos<span class="mif-apps place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
Podria ser necesario actualizar algunos datos de todos los productos actualizados

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
	
						echo '<table class="dataTable border bordered" data-role="datatable" data-auto-width="false" >
						<thead>
							<tr>
								<td class="title">Detalle de Registro</td>
								<td class="title">Registro en BD</td>
							</tr>							
						</thead>
						<tbody>';
	
	
    for ($row = 2; $row <= $highestRow; ++ $row) {
        //echo '<tr>';
        //for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow(0,$row);
			$codigo_producto=$cell->getValue();
            //$cellCOD = $worksheet->getCellByColumnAndRow(1,$row);
			$nuevo_codigo_producto=$cell->getValue();
            $cell2 = $worksheet->getCellByColumnAndRow(1,$row);
			$name=$cell2->getValue();
            $cell3 = $worksheet->getCellByColumnAndRow(2,$row);
			$nchino=$cell3->getValue();
            $cell4 = $worksheet->getCellByColumnAndRow(3,$row);
			$ningles=$cell4->getValue();
            $cell5 = $worksheet->getCellByColumnAndRow(4,$row);
			$precio=$cell5->getValue();
            $cell7 = $worksheet->getCellByColumnAndRow(5,$row);
			$marca=$cell7->getValue();
            $cell8 = $worksheet->getCellByColumnAndRow(6,$row);
			$industria=$cell8->getValue();
            $cell9 = $worksheet->getCellByColumnAndRow(7,$row);
			$stock_minimo=$cell9->getValue();
            $cell10 = $worksheet->getCellByColumnAndRow(8,$row);
			$unidad=$cell10->getValue();
            $cell11 = $worksheet->getCellByColumnAndRow(9,$row);
			$observaciones=$cell11->getValue();
			$estado='Activo';
            $cell12 = $worksheet->getCellByColumnAndRow(10,$row);
			$imagen=$cell12->getValue();
            $cell13 = $worksheet->getCellByColumnAndRow(11,$row);
			$Precio_pref=$cell13->getValue();
            $cell14 = $worksheet->getCellByColumnAndRow(12,$row);
			$Precio_Reg=$cell14->getValue();
            $cell15 = $worksheet->getCellByColumnAndRow(13,$row);
			$Precio_Irreg=$cell15->getValue();
		
			$consulta="UPDATE `motos`.`producto` SET `CODIGO_PRODUCTO`='$nuevo_codigo_producto',`NOMBRE_PRODUCTO`='$name',`NOMBRE_CHINO`='$nchino',`NOMBRE_INGLES`='$ningles',`PRECIO_UNITARIO_PROD`=$precio,`MARCA`='$marca',`INDUSTRIA`='$industria',
			`STOCK_MINIMO`=$stock_minimo,`UNIDAD`='$unidad',`OBSERVACIONES_PRODUCTO`='$observaciones',`IMAGEN1`='$imagen',`PREFERENCIAL`=$Precio_pref,`REGULAR`=$Precio_Reg,`IRREGULAR`=$Precio_Irreg WHERE `CODIGO_PRODUCTO`='$codigo_producto'";
			
	//echo $consulta;
			
			if($codigo_producto != null)
			{
			$queryuser = mysql_query("SELECT codigo_producto FROM producto where codigo_producto='$codigo_producto'");
			//echo cuantos_registros_bd($queryuser);
			//echo '<br>';
			
			
			if(cuantos_registros_bd($queryuser) == 0 )
			{	
				echo "<td class='campotablas'>El producto: ".$codigo_producto."  no existe en la base de datos, este no fue actualizado</td>
				<td><font color='red'>El producto no fue Actualizado</font></td></tr>";
				
			}
			else
			{
				//echo $consulta;
				mysql_query($consulta);	
				
				echo "<td class='campotablas'>El producto con codigo: ".$codigo_producto. "  fue actualizado en la base de datos</td>
				<td><font color='green'>El producto fue actualizado</font></td></tr>";
				
			}
			}


    }
    //echo '</table>';
}


						

?>



