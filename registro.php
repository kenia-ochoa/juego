<?php

/*$enlace = new mysqli('localhost', 'root','',  'app');//'app' nombre de la bd

    if ($enlace->connect_errno) {
        printf("Connect failed: %s\n", $enlace->connect_error);
        exit();
    }

  if (isset($_POST["bt_entrar"])) {


        $l=(object)$_POST;
        
        if ($usuario = $enlace->query( "SELECT * FROM registro WHERE nombre_usu='$l->usuario' AND contrasena= '$l->contrasena'" )) {
             while ($persona = $usuario->fetch_object()) {
                echo "Dentro";
                //print_r($persona);
                $_SESSION['logueado'] = true;
                $_SESSION['nombre'] = $persona->nombre; 
                //print_r($_SESSION);
                if ($_SESSION['logueado'] == true) {
                    "<form action='Perfil.php¿ method='post'> 
                    <br><input type='submit' value='Entrar' name='bt_entrar' >
                 </form>";
                }
                header('Location: Perfil.php');
                exit();
            }
                       
        }else {
            echo"Errormessage: %s\n", $enlace->error;
            
        }
    }*/

?>
  <html>
 



<head>
<meta charset="UTF-6">
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilossregistro.css">
    
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="main.js"></script>
    <script src="ir-arriba.js"></script>
</head>
<body>
<span class="ir-arriba icon-arrow2"></span>
<h4><font face="Neuropol" color="black">
    <header>
        <div class="menu_bar">
            <a href="#" class="bt-menu"><span class="icon-menu2"></span>Menú</a>
        </div>
 
 <nav class="menu-fixed">

<ul>
<center>
<br>
                <b><FONT   color=white face="verdana " >REGISTRO</FONT></b>

</center>

  <h1><p align="right"><a href='cerrar_session.php?'  style="color: white;" >Regresar</a></h1>

            </ul>
              
        
        </nav>
        <br>
        <br>


        <form action="registro.php" method="post"> 
                    
            <br><input type="text" name="nombres" placeholder="nombres ">
            <br><input type="text" name="apellidos" placeholder="Apellidos">
            <br><input type="text" name="usuario" placeholder="Nombre usuario">
            <br><input type="password" name="contrasena" placeholder="Contrasena">
            <br><input type="password" name="confirmar_contrasena" placeholder="Confirmar Contrasena">
            <br><input type="number" name="telefono" placeholder="Telefono">
            <br><input type="varchar" name="correo" placeholder="Correo">
            <br><input type="text" name="sexo" placeholder="Sexo">
            <br><input type="varchar" name="edad" placeholder="Edad">
            <br><input type="date" name="fecha_de_nacimiento" placeholder="Fecha de Nacimiento">
            <br><input type="submit" value="Guardar" name="bt_guardar">
        </form>

   
<?php

/**/$enlace = new mysqli('localhost', 'root','',  'juegoweb');//'app' nombre de la bd

    if ($enlace->connect_errno) {
        printf("Connect failed: %s\n", $enlace->connect_error);
        exit();
    }


  if (isset($_POST["bt_guardar"])) {
        $r =(object)$_POST;
        //insertar
        $campos = "nombres, apellidos, usuario, contrasena, confirmar_contrasena, telefono, correo, sexo, edad, fecha_de_nacimiento "; //son los valores que esan en bd
        $valores = "'$r->nombres','$r->apellidos','$r->usuario', '$r->contrasena', '$r->confirmar_contrasena', '$r->telefono', '$r->correo','$r->sexo', '$r->edad', '$r->fecha_de_nacimiento'"  ; 

        if (!$enlace->query( "INSERT INTO   iniciar ($campos) values ($valores)" )) {
            
            
            echo"Errormessage: %s\n", $enlace->error;    
            
            
        }else{ 
        echo "<b>Insertado";
        }
    }

?>
  <form action="Iniciar_sesion.php" method="post">
            
            <br><input type="submit" value="Iniciar Sesión" name="bt_iniciar_sesion" >
            
        </form>

 </body>
</html>