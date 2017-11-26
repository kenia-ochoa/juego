
<?php session_start(); ?>


<html>
<head>
<meta charset="UTF-6">
    
        <!--div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-menu2"></span>Menú</a>
        </div-->
 
        <nav class="menu-fixed">

            <ul>
            <center>
                

</center>
            </ul>
        </nav>
    </header>



<html>
    <head>
        <title>Inicio</title>
    </head>
    <body>
    <center>
            <br>
        <br>
        <br>
        <br>
<br>
        <br>
<br>
        <br>


        <form action="Iniciar_sesion.php" method="post" style=" position:absolute;border: 2px solid #5878ca;;top: 120px;left: 920px">
            Usuario <br><input type="varchar" name="usuario"  placeholder="Ejemplo_Ochoa_" > <br>           
            Contraseña<br><input type="password" name="contrasena" placeholder="********"  >
            <br><input type="submit" value="Entrar" name="bt_entrar" >
        </form>

        <form action="registro.php" method="post" style=" position:absolute;border: 2px solid #5878ca;;top: 339px;left: 920px">
             <br><input type="submit" value="Registrarse" name="bt_registrarce" >
        </form>
        
<div style="position:absolute;top: 190px;padding:50px;color: #1a4965;border: 2px solid #5878ca;;font-family: sans-serif;border-radius: 35px 0px 35px 0px;-moz-border-radius: 35px 0px 35px 0px;-webkit-border-radius: 35px 0px 35px 0px;background-color:#d2d4d4;line-height:1;left: 20px";><h1>
Es la tercera etapa en la teoría de desarrollo <br>
cognitivo de Piaget,se caracteriza <br>
principalmente por  el desarrollo del<br>
 pensamiento cognitivo y racional.
</div></h1>


</center>

          <html>
<head>
<meta charset="UTF-6">
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilosentrada.css">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="main.js"></script>
    <script src="ir-arriba.js"></script>
</head>
<body>
<span class="ir-arriba icon-arrow2"></span>
<h4><font face="Neuropol" color="black">
    <header>
        <!--div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-menu2"></span>Menú</a>
        </div-->
 
        <nav class="menu-fixed">

            <ul>
            <center>
                <b><FONT  size=5 color=white face="verdana " ><br>ETAPA OPERATIVA CONCRETA</FONT></b>
                <br>

</center>
            </ul>
        </nav>
    </header>


        <br>
        <br>
        <br>


<?php

    echo "<br>";
        

/**/$enlace = new mysqli('localhost', 'root','',  'juegoweb');//'app' nombre de la bd

    if ($enlace->connect_errno) {
        printf("Connect failed: %s\n", $enlace->connect_error);
        exit();
    }

  if (isset($_POST["bt_entrar"])) {


        $l=(object)$_POST;
        //print_r($_POST);
        
        if ($usuario = $enlace->query( "SELECT * FROM iniciar WHERE usuario='$l->usuario' AND contrasena= '$l->contrasena'" )) {
             while ($persona = $usuario->fetch_object()) {
                echo "Dentro";
                //print_r($persona);
                $_SESSION['registrado'] = true;
                $_SESSION['nombre'] = $persona->nombre; 
                //print_r($_SESSION);


                if ($_SESSION['registrado'] == true) {
                    "<form action='categoria.php ¿method='post'> 
                   <br><input type='submit' value='Entrar' name='bt_entrar' 
                 </form>";
                 header('Location:categoria.php');
                exit();
                }
                
            }
                       
        }else {

            echo"Errormessage: %s\n", $enlace->error;            
        }
    }


?>


          


