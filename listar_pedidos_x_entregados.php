<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />
    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/jquery.dataTables.min.js"></script>

    <script src="docs/js/metro.js"></script>
	<script language="JavaScript" src="calendar1.js"></script>
	<script language="javascript"> 
	function window_open()
	  {
		var newWindow;
		var urlstring = 'calendar.html'
		newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
	  }
	</script>

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

 
</head>
<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Pedidos Entregados: Seleccionar Periodo<span class="mif-calculator place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					<form method="post" action="listarPedidosEntregados.php" name="ventas" >
						<select name="select">
						  <option selected>Del Dia</option> 
						  <option>De la Semana</option>
						  <option>Del mes actual</option>
						  <option>Del mes anterior</option>
						  <option>Seleccionar Periodo de Tiempo</option>
						  <option>Todos los Pedidos</option>
						</select><br><br>
						Fecha Inicio: <input type="text" name="fecha_inicio" id="fi" maxlength="20" tabindex="8" class="Formulario" value="" readonly />
						<a href="javascript:cal1.popup();" onClick="desavilitar();">
						<img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  >		 </a> Fecha Fin: 
						<input type="text" name="fecha_fin" id="ff" maxlength="20" tabindex="8" class="Formulario" value="" readonly />
						<a href="javascript:cal2.popup();" onClick="desavilitar();">
						<img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  >		 </a>
						<br><br>
						<div class="form-actions">
							<button type="submit" class="button primary">Buscar Pedidos</button>
						</div>
					</form>
                    <hr class="thin bg-grayLighter">
				</div>
            </div>
		</div>
	</div>
</body>
</html>
  <script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['fi']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			var cal2 = new calendar1(document.forms['ventas'].elements['ff']);
			cal2.year_scroll = true;
			cal2.time_comp = false;
			
			
		//-->
		</script>