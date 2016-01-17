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
	
	
		   <script>
	function validarFormulario()
	{
		id = document.getElementById("ciField").value;
		
		

		if( id == null || id.length == 0)
		{
			console.log("entro");
			window.alert("El Nombre no puede estar vacio");
			return false;
		}
	
	}
   </script>
	
</head>
<body class="bg-steel">
   <div class="page-content2">
        <div class="flex-grid no-responsive-future" style="height: 100%;">
            <div class="row" style="height: 100%">
 
                <div class="cell auto-size padding20 bg-white" id="cell-content">
                    <h1 class="text-light">Registro de Nueva Zona<span class="mif-users place-right"></span></h1>
                    <hr class="thin bg-grayLighter">
					

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">
 
 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">

</SCRIPT>
 
 

<br>

<form action="registrar_zona2.php" method="post" name="ventas" onSubmit="return validarFormulario();">

<table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
      <td height="31" ></td>
      <td ></td>
      <td></td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      
<td>

<table width="60%" align="center">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N Zona</td>
          </tr>
            <tr> 
              <td class="campotablas">Codigo Zona:</td>
            <td class="campotablas">
			<?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(id) as p FROM zona" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			
			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" readonly="true" tabindex="1" class="Formulario" value='.$nc.'>'; ?>            </td>
              <td class="campotablas">Nombre de Zona:</td>
            <td class="campotablas"><input type="text" id="ciField" name="ci" maxlength="30" tabindex="2" class="Formulario" autofocus>            </td>
          </tr>
          
        </table>


<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="Administrar_zonas.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  

<p align="center"><a href="administrar_zonas.php">VOLVER ATRAS</a></p>

	</div>
            </div>
		</div>
	</div>
</body>
</html>