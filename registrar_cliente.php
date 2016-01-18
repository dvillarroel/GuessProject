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
                    <h1 class="text-light">Registrar Nuevo Cliente<span class="mif-users place-right"></span></h1>
                    <hr class="thin bg-grayLighter">

<link href="hoja_de_estilo.css" type="text/css" rel="stylesheet">

 <script  language="JavaScript" src="validacion.js" type="text/javascript"></script>
 <SCRIPT language="javascript">

</SCRIPT>
 
 

<script language="JavaScript" src="calendar1.js"></script>
<script language="javascript"> 
 function window_open()
  {
	var newWindow;
	var urlstring = 'calendar.html'
	newWindow = window.open(urlstring,'','height=200,width=280,toolbar=no,minimize=no,status=no,memubar=no,location=no,scrollbars=no')
  }
 </script>
 	 <script>
	console.log("function javascript");

	function validarFormulario()
	{
		valor = document.getElementById("nombreField").value;
		id = document.getElementById("ciField").value;
		ap = document.getElementById("apField").value;
		am = document.getElementById("amField").value;
		username = document.getElementById("username").value;
		pwd_1= document.getElementById("password1").value;
		pwd_2= document.getElementById("password2").value;
		tel= document.getElementById("telf").value;

		
		console.log(valor);
		returnvalue = true;

				if( valor == null || valor.length == 0)
		{
			console.log("entro");
			window.alert("El Nombre no puede estar vacio");
			return false;
		}
		
		if( id == null || id.length == 0)
		{
			console.log("entro");
			alert("El CI no puede estar vacio");
			return false;
		}
		else
		{
			var i=0;
			while (i<id.length)
			{	
				if ((id.charAt(i)>='0') && (id.charAt(i)<='9'))
				i=i+1;
				else
				{
					alert("El CI tiene que ser numeral de 7 digitos");
					return false;
				}
			}
			
		}

		if( tel == null || tel.length == 0)
		{
			console.log("entro");
			alert("El telefono no puede estar vacio");
			return false;
		}
		else
		{
			var i=0;
			while (i<tel.length)
			{	
				if ((tel.charAt(i)>='0') && (tel.charAt(i)<='9'))
				i=i+1;
				else
				{
					alert("El telefono tiene que ser numeral");
					return false;
				}
			}
			
		}

		
		if( ap == null || ap.length == 0)
		{
			alert("El Apellido Paterno no puede estar vacio");
			return false;
		}
		if( username == null || username.length == 0)
		{
			alert("El nombre de usuario no puede estar vacio");
			return false;
		}

				if( pwd_1 == null || pwd_2.length == 0)
		{
			alert("El password no puede esta vacio");
			return false;
		}
		else
		{	
			if( pwd_1 != pwd_2)
			{
				alert("El password no coinciden");
				return false;

			}
			
		}

		if( username == null || username.length == 0)
		{
			alert("El nombre de usuario no puede estar vacio");
			return false;
		}

		
	 }
</script>


<br>

<form action="registrar_cliente2.php" method="post" name="ventas" onSubmit="return validarFormulario();">


<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
      
<td>

<table width="70%" align="center">
          <tr> 
              <td colspan="4"  class="title">INFORMACI&Oacute;N CLIENTE</td>
          </tr>
            <tr> 
              <td width="25%" class="campotablas">Codigo Cliente:</td>
            <td width="25%" class="campotablas">
			<?php 
			require_once("manejomysql.php");
			conectar_bd();
			$resultado= consulta_bd("SELECT max(codigo_cliente) as p FROM cliente" );
			
			$a=sacar_registro_bd($resultado);
			$nc=$a['p']+1;
			
			$resultado7=consulta_bd("SELECT CURRENT_DATE as date" );
	$registro7= sacar_registro_bd($resultado7);
	$fecha=$registro7['date'];
			
			
			echo ' <input type="text" name="codigo_cliente" maxlength="15" readonly="true" tabindex="1" class="Formulario" value='.$nc.'>'; ?>            </td>
              <td width="25%" class="campotablas">Nombre Cliente o Empresa:</td>
            <td width="25%" class="campotablas"><input type="text" id="nameField" name="ci" maxlength="20" tabindex="2" class="Formulario" autofocus>            </td>
          </tr>
          <tr> 
              <td class="campotablas">Apellido Paterno:</td>
            <td class="campotablas"><input type="text" id="apfield" name="apellido_paterno" maxlength="15" tabindex="3" class="Formulario">            </td>
              <td class="campotablas">Apellido Materno:</td>
            <td class="campotablas"><input name="apellido_materno" id="amfield" type="text" class="Formulario" tabindex="4" maxlength="17"  >            </td>
          </tr>
		  
		  <tr> 
              <td height="27"class="campotablas">CI &oacute; NIT:</td>
            <td class="campotablas"> <input type="text" name="nombres" id="cifield" maxlength="25" tabindex="5" class="Formulario">            </td>
              <td class="campotablas">Direccion:</td>
            <td class="campotablas"><input type="text" name="direccion" id="dirfield" maxlength="255" tabindex="6" class="Formulario">            </td>
          </tr>
          
          <tr> 
              <td class="campotablas">Correo Electronico:</td>
            <td class="campotablas"><input name="telefono" type="text" id="mailField" class="Formulario" tabindex="7" value="test@hotmail.com"  maxlength="45"></td>
              <td class="campotablas">Fecha de Registro:</td>
           <td class="campotablas"> 
			<input type="text" name="correo_electronico" id="correo_electronico" maxlength="20" tabindex="8" class="Formulario" value=<?php echo $fecha ?> readonly />
			<a href="javascript:cal1.popup();" onClick="desavilitar();">
		  <img src="cal.png" width="16" height="16" border="0" alt="Click para ver Calendario"  >		 </a>		 </td>
          </tr>
          <tr>
            <td class="campotablas">Seleccionar Zona:</td>
            <td class="campotablas"><label>
              <select name="1" id="1" tabindex="9" >
				<?php
					$zonas= consulta_bd("SELECT id, nombre_zona FROM zona" );
									
					for ( $i=0; $i< cuantos_registros_bd($zonas); $i++)
					{
						
						$zonasResult=sacar_registro_bd($zonas);
						echo '<option id='.$zonasResult["id"].'>'.$zonasResult["nombre_zona"].'</option>';
					}

				
				?>
                </select>
            </label></td>
            <td class="campotablas">Telefono:</td>
            <td class="campotablas"><input name="direccion2" id="telfield" type="text" class="Formulario" tabindex="10" value="0" maxlength="255"></td>
          </tr>
          <tr>
            <td class="campotablas">Tipo de Cliente</td>
            <td class="campotablas"><select name="12" id="12" tabindex="11">
              <option>Preferencial</option>
              <option>Regular</option>
              <option>Irregular</option>
              <option selected>Nuevo S/T</option>
            </select></td>
            <td class="campotablas">&nbsp;</td>
            <td class="campotablas">&nbsp;</td>
          </tr>
        </table>


</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td width="18" height="19" class="border-bleft"></td>
<td class="border-bmain"></td>
<td class="border-bright"></td></tr>
</tbody></table>

<br>
  <table width="80%" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr> 
        <td height="31" >&nbsp;</td>
      <td ></td>
        <td >&nbsp;</td>
    </tr>
  </tbody>
</table>

<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>

<td>

<center>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFFFCC" bgcolor="#E4E4E4" style="TABLE-LAYOUT: fixed">
    <tr> 
      <td width="32%" height="24"  class="title" >OBSERVACIONES</td>
    </tr>
    <tr> 
      <td > <textarea name="observaciones" class="interiorArea" style="WIDTH: 100%; HEIGHT: 60px" ></textarea> </td>
    </tr>
  </table>



</td>
        <td >&nbsp;</td>
</tr></tbody>
</table>
<table width="80%" align="center" cellpadding="0" cellspacing="0">
<tbody><tr>
<td class="border-bleft" width="18"></td>
<td class="border-bmain"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="1"></td>
<td class="border-bright"><img src="../images/blank.gif" alt="" style="display: block;" height="18" width="18"></td></tr>
</tbody></table>

  <br>

<table width="30%" border="0" align="center" >
    <tr>
      <td align="center">
	  <input name="image"  type="image" onMouseOver= src="images/r2.gif" onMouseMove= src="images/r2.gif" onMouseOut=src="images/r1.gif" value="" SRC="images/r1.gif"> </td></form>
      <form action="principal_target.php" method="post"><td align="center"><input name="cancelar"  type="image" onMouseOver= src="images/c2.gif" onMouseMove= src="images/c2.gif" onMouseOut=src="images/c1.gif" value="" SRC="images/c1.gif"> </td> </form>
    </tr>
  </table>
  

 
<p>
  <script language="JavaScript">
			var cal1 = new calendar1(document.forms['ventas'].elements['correo_electronico']);
			cal1.year_scroll = true;
			cal1.time_comp = false;
			
			
		//-->
		</script>
</p>
<p align="center"><a href="principal_target.php">VOLVER A LA PAGINA PRINCIPAL</a></p>


</div>
            </div>
		</div>
	</div>
</body>
</html>