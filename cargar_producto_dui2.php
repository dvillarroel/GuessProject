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
                    <h1 class="text-light">Cargar DUI a la base de datos<span class="mif-apps place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					Detalles del registro:
					<br>
					<br>
					<font color='blue'>Note: Podria ser necesario actualizar algunos datos de todos los productos actualizados</font><br>


<?php

	require_once("manejomysql.php");
	conectar_bd();

include 'PHPExcel/IOFactory.php';
$objPHPExcel = PHPExcel_IOFactory::load("formato-productos-dui.xls");

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
	//echo $worksheetTitle;
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
	$aux = 0;

	
    for ($row = 2; $row <= $highestRow; ++ $row) {
        //echo '<tr>';
        //for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow(0,$row);
			$codigo_dui=$cell->getValue();
            $cell2 = $worksheet->getCellByColumnAndRow(1,$row);
			$codigo_producto=$cell2->getValue();
            $cell3 = $worksheet->getCellByColumnAndRow(2,$row);
			$nombre_producto=$cell3->getValue();
            $cell4 = $worksheet->getCellByColumnAndRow(3,$row);
			$cantidad=$cell4->getValue();
            $cell5 = $worksheet->getCellByColumnAndRow(4,$row);
			$precio=$cell5->getValue();
            $cell6 = $worksheet->getCellByColumnAndRow(5,$row);
			$fecha=$cell6->getValue();
			if(PHPExcel_Shared_Date::isDateTime($cell6)) {
			$fecha = date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha)); }			
            
			//verify if DUI is already registered in the database
			
			if($aux == 0)
			{
				$queryuser = mysql_query("SELECT duinumber FROM dui where duinumber='$codigo_dui'");	
			}
			else
			{
				$queryuser = mysql_query("SELECT duinumber FROM dui where duinumber='xyz'");
				
			}
			
			
			//echo cuantos_registros_bd($queryuser);
			//echo '<br>';

			if(cuantos_registros_bd($queryuser) != 0 )
			{	
		
				echo "<font color='red'>El codigo DUI: ".$codigo_dui." para el producto ".$codigo_producto." ya existe en la base de datos, este no fue registrado, favor revisar archivo</font><br>";
		
			}
			else
			{
				//verify if product is registered in the DB
				$queryuser2 = mysql_query("SELECT codigo_producto FROM producto where codigo_producto='$codigo_producto'");
				if(cuantos_registros_bd($queryuser2) == 0 )
				{
					echo "<font color='red'>El producto con codigo:".$codigo_producto." no existe en la base de datos, se debe actualizar los productos con la informacion del producto</font><br>";	
					$resultado= consulta_bd("SELECT max(id) as p FROM dui" );
					$a=sacar_registro_bd($resultado);
					$nc=$a['p']+1;
					//$fecha1=date("d-m-Y", $fecha);
					$consulta="insert into dui values($nc, '$codigo_dui', '$codigo_producto', $cantidad, '$fecha', $precio);";
					mysql_query($consulta);	
					//echo $consulta."<br>";
					echo "<font color='green'>El producto con codigo: ".$codigo_producto. " y DUI: ".$codigo_dui." fueron resgistrado en la base de datos, es necesario actualizar el stock de los productos</font><br>";
					
					
					
				}
				else
				{
					$resultado= consulta_bd("SELECT max(id) as p FROM dui" );
					$a=sacar_registro_bd($resultado);
					$nc=$a['p']+1;
					//$fecha1=date("d-m-Y", $fecha);
					$consulta="insert into dui values($nc, '$codigo_dui', '$codigo_producto', $cantidad, '$fecha', $precio);";
					mysql_query($consulta);	
					//echo $consulta."<br>";	
					echo "<font color='green'>El producto con codigo: ".$codigo_producto. " y DUI: ".$codigo_dui." fueron resgistrado en la base de datos, es necesario actualizar el stock de los productos</font><br>";
				
					$consultaProduct = consulta_bd("Select saldo, saldoMoney, leftDUI from kardex where productoID='$codigo_producto' order by id DESC LIMIT 1");
					if(cuantos_registros_bd($consultaProduct) != 0 )
					{
						$consultaID = consulta_bd("Select max(id) as p from kardex");
						$resultProduct = sacar_registro_bd($consultaProduct);
						$resultid = sacar_registro_bd($consultaID);
						if($resultid['p'] != null)
						{
							$codigoKardex =  $resultid['p'] + 1;	
							
						}
						else
						{
							$codigoKardex =1;
							
						}
						
						$saldo = $resultid['saldo'] + $cantidad;
						$haber = $cantidad * $precio;
						$saldoMoney = $resultid['saldoMoney'] + $haber;
						$leftDUI = $resultid['leftDUI'];
						
						$consultaKardex="insert into kardex values($codigoKardex, '$codigo_producto', '$nombre_producto', '$fecha',$cantidad, 0, $saldo, $precio, $haber,0,$saldoMoney,$codigo_dui, 'Ingreso producto Dui', $leftDUI );";
						//echo $consultaKardex;
						mysql_query($consultaKardex);	
						
						
						
					}
					else
					{
						
						$consultaID = consulta_bd("Select max(id) as p from kardex");
						$resultid = sacar_registro_bd($consultaID);
						if($resultid['p'] != null)
						{
							$codigoKardex =  $resultid['p'] + 1;	
							
						}
						else
						{
							$codigoKardex =1;
							
						}
						$saldo = $cantidad;
						$haber = $cantidad * $precio;
						$saldoMoney = $haber;
						
						$consultaKardex="insert into kardex values($codigoKardex, '$codigo_producto', '$nombre_producto', '$fecha',$cantidad, 0, $saldo, $precio, $haber,0,$saldoMoney,$codigo_dui, 'Ingreso producto Dui', $cantidad);";
						//echo $consultaKardex;
						mysql_query($consultaKardex);
					}
				
					
				
				
				}
				$aux=1;

				
			}


    }
}
?>


  <p align="center"><a href="administrar_productos.php">VOLVER ATRAS</a></p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>
  
</div>
            </div>
		</div>
	</div>
</body>
</html>
