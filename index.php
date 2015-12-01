<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='docs/favicon.ico' />

    <title>SISTEMA DE ADMINISTRACION</title>

    <link href="docs/css/metro.css" rel="stylesheet">
    <link href="docs/css/metro-icons.css" rel="stylesheet">
    <link href="docs/css/metro-responsive.css" rel="stylesheet">

    <script src="docs/js/jquery-2.1.3.min.js"></script>
    <script src="docs/js/metro.js"></script>
 
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>

        /*
        * Do not use this is a google analytics fro Metro UI CSS
        * 
        if (window.location.hostname !== 'localhost') {

            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-58849249-3', 'auto');
            ga('send', 'pageview');

        }

		*/
        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
		
    </script>
</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <form action="validar.php" method="post">
            <h1 class="text-light">Acceder al Sistema</h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login">Nombre de Usuario:</label>
                <input type="text" name="text1" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password">Contrase&#241a:</label>
                <input type="password" name="text2" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary">Ingresar</button>
            </div>
        </form>
    </div>

	<div>
	<br>
	<br>
	<br>
		<br>
	<br>
	<br>
<?php
if( !empty($_GET['error_login']) )
{

	if($_GET['error_login'] == 1)
	{
		$respuesta='EL NOMBRE DE USUARIO NO PUEDE ESTAR VACIO';
	}
	if($_GET['error_login'] == 2)
	{
		$respuesta='LA CONTRASENA NO PUEDE ESTAR VACIO';
	}
	
	if($_GET['error_login'] == 3)
	{
		$respuesta='EL NOMBRE DE USUARIO ES INCORRECTO';
	}
	
	if($_GET['error_login'] == 4)
	{
		$respuesta='LA CONTRASENA ES INCORRECTA';
	}
	
	if($_GET['error_login'] == 5)
	{
		$respuesta='SU CUENTA SE ENCUENTRA DESHABILITADA, CONSULTE CON SU ADMINISTRADOR';
	}
	
	echo '<table width="30%" border="0" align="center" cellpadding="0" cellspacing="0">
  		
		<tr>
    		<td><font color="#FFFFFF">'.$respuesta.'</font></td>
  		</tr>
	</table>';


}

?></div>

</body>
</html>