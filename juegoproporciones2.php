<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-6">
    <title>JUEGO DE PERCEPCIÓN </title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/diseñojuego1.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="main.js"></script>
    <script src="ir-arriba.js"></script>
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
                <b><FONT  size=5 color=white face="verdana " ><br>JUEGO DE CONSERVACIÓN</FONT></b>
                <br>
                



</center>
<h1><p align="right"><a href='categoria.php?'  style="color: white;" >  REGRESAR</a></h1>
            </ul>

        </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

  

<CENTER>
<title>juego Conservación</title>

    <h1> ¿ Cuál de las cuerdas es mas larga ?</h1>
   
<div id="square"> <br> <h2>1   ...  2</h2><TR><TD><IMG SRC="img/cuerda 1.png"  width="400px" height="250px"></TD></TR> <TR><TD><IMG SRC="img/cuerda 2.png" width="300px" height="250px"></TD></TR></div><style>  #square {width:850px; height:300px; background:#FF5733;} </style>
</CENTER>
<center>

 <br>

<h2> Selecciona la respuesta correcta </h2>

<form action="categoria.php" method="post" class="div"><br>
        <label class="di"><input type="radio" name="vaso1" value="uno"> La cuerda 1.</label>
        <label class="di"><input type="radio" name="vaso1" value="dos">la cuerda 2.</label>
        <label class="di"><input type="radio" name="vaso1" value="tres">tienen el mismo largo.</label>
        <input type="submit" value="Enviar" name="bt_enviar" >
</form>


 <?php

//print_r($_POST);
if (isset($_POST['bt_enviar'])) {
    
    if ($_REQUEST['vaso1']=="uno") {
        //echo "hola";
        echo "<script language= javascript type= text/javascript src='js/alert.js'></script>";
    }elseif ($_REQUEST['vaso1']=="dos") {
        //echo "hola 2";
        echo "<script language= javascript type= text/javascript src='js/alert.js'></script>";

    }elseif ($_REQUEST['vaso1']=="tres") {
        echo "hola 3";
    }
}

   
   ?>
