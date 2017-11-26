<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-6">
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/estilocategoria.css">
    <link rel="stylesheet" href="style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="main.js"></script>
    <script src="ir-arriba.js"></script>
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
                <b><FONT  size=5 color=white face="verdana " ><br>JUEGO DE CLASIFICACIÓN</FONT></b>
                <br>
                


</center>
<h1><p align="right"><a href='categoria.php?'  style="color: white;" >  REGRESAR</a></h1>
            </ul>

        </nav>

    </header>
    <!DOCTYPE html>
<html>
<head>

<br>
<br>
<br>
<br>
<br>
<br>
<style>
div#memory_board{
    background:#962498;
    border:#40a9a9 5px solid;
    width:800px;
    height:540px;
    padding:24px;
    margin:0px auto;
}
div#memory_board > div{
    background: url(4.jpg) no-repeat;
    border:#40a9a9 5px solid;
    width:350px;
    height:80px;
    float:left;
    margin:10px;
    padding:0px;
    font-size:70px;
    cursor:pointer;
    text-align:center;
}
header nav {
    background:#023859;/*color barra del menú*/
    /*z-index:1000;
    max-width: 1400px;
    width:95%;*/
    margin:0px auto;
    width:100%;
    max-width: 2400px;
</style>
<script>
// Scripted By Adam Khoury in connection with the following video tutorial:
// http://www.youtube.com/watch?v=c_ohDPWmsM0
var memory_array = ['1','1','2','2','3','3','4','4','5','5'];
var memory_values = [];
var memory_tile_ids = [];
var tiles_flipped = 0;
Array.prototype.memory_tile_shuffle = function(){
    var i = this.length, j, temp;
    while(--i > 0){
        j = Math.floor(Math.random() * (i+1));
        temp = this[j];
        this[j] = this[i];
        this[i] = temp;
    }
}
function newBoard(){
    tiles_flipped = 0;
    var output = '';
    memory_array.memory_tile_shuffle();
    for(var i = 0; i < memory_array.length; i++){
        output += '<div id="tile_'+i+'" onclick="memoryFlipTile(this,\''+memory_array[i]+'\')"></div>';
    }
    document.getElementById('memory_board').innerHTML = output;
   // document.write("<a href='juego_conservacion.php'>Siguiente</a>").innerHTML;
}
function memoryFlipTile(tile,val){
    if(tile.innerHTML == "" && memory_values.length < 2){
        tile.style.background = '#FFF';
        tile.innerHTML = val;
        if(memory_values.length == 0){
            memory_values.push(val);
            memory_tile_ids.push(tile.id);
        } else if(memory_values.length == 1){
            memory_values.push(val);
            memory_tile_ids.push(tile.id);
            if(memory_values[0] == memory_values[1]){
                tiles_flipped += 2;
                // Clear both arrays
                memory_values = [];
                memory_tile_ids = [];
                // Check to see if the whole board is cleared
                if(tiles_flipped == memory_array.length){
                    //alert("Board cleared... generating new board");                   
                //document.write("<a href='juego_conservacion.php'>Siguiente</a>");   
                    window.location="juego_conservacion.php";
                  //  document.getElementById('memory_board').innerHTML = "";
                    //newBoard();
                }
            } else {
                function flip2Back(){
                    // Flip the 2 tiles back over
                    var tile_1 = document.getElementById(memory_tile_ids[0]);
                    var tile_2 = document.getElementById(memory_tile_ids[1]);
                    tile_1.style.background = 'url(4.jpg) no-repeat';
                    tile_1.innerHTML = "";
                    tile_2.style.background = 'url(tile_bg.jpg) no-repeat';
                    tile_2.innerHTML = "";
                    // Clear both arrays
                    memory_values = [];
                    memory_tile_ids = [];
                 }
                setTimeout(flip2Back, 700);

            }
        }
    }
}
</script>
</head>
<body>
<div id="memory_board"></div>
<script>newBoard();

</script>

</body>
</html>