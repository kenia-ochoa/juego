<html><html>
    <head>
        <title>Prueba Snake</title>
    </head>
    <body bgcolor="black" onload="Loading()">
        <script type="text/javascript" src="./wz_jsgraphics.js"></script>
        <div align=center id="juego">
            <font color="#ffffff">Hola</font>
            <script>
                document.onmousemove = MoverMouse;
                document.onmousedown = ClickMouse;
                document.onmouseup = DesClickMouse;
                document.onkeydown = KeyPressed;
                //Variables Pintar y Visaje
                var mazes = new jsGraphics("juego");
                var paleta = new jsGraphics("juego");
                var coloreado = new jsGraphics("juego");
                var vectorMaze = new Array();
                var tmpColo = new Array(255,0,0);
                var fig = 0;//figura para dibujar
                var radioFig = 10;
                var fondColor = 0;
                var escogioColor = false;
                var escogeColor = false;
                var pintar = false;
                var pinto = false;
                function toHex(a){
                    var res = "";
                    var charset ="0123456789abcdef";
                    do{
                        res = charset.charAt(a&15)+""+res;
                    }while((a>>=4)>0);
                    while(res.length<2)res = "0"+res;
                    return res;
                }
                function damePuntero(){
                    paleta.clear();
                    mazes.setColor("white");
                    mazes.fillRect(20,20,400,400);
                    mazes.paint();
                    //Solucion usar un vector...dudo que funque :(....Como dije, funca pero lentoooooooooooooooo
                    for(var n = 0;n<vectorMaze.length;n++){
                        var primComa = parseInt(vectorMaze[n].indexOf(","));
                        var segunComa = parseInt(vectorMaze[n].indexOf(",",primComa+1));
                        var tercerComa = parseInt(vectorMaze[n].indexOf(",",segunComa+1));
                        var cuarComa = parseInt(vectorMaze[n].indexOf(",",tercerComa+1));
                        var xT = parseInt(vectorMaze[n].substring(0,primComa));
                        var yT = parseInt(vectorMaze[n].substring(primComa+1,segunComa));
                        var figT =parseInt(vectorMaze[n].substring(1+segunComa,tercerComa));
                        var radioT = parseInt(vectorMaze[n].substring(1+tercerComa,cuarComa));
                        coloreado.setColor(vectorMaze[n].substring(cuarComa+1,vectorMaze[n].length));
                        //alert (xT+" "+yT+" "+figT+" "+radioT+" "+vectorMaze[n].substring(cuarComa+1,vectorMaze[n].length))
                        /*if(figT==0)
            coloreado.fillRect(xT-radioT,yT-radioT,2*radioT,2*radioT);
            else
            coloreado.fillOval(xT-radioT,yT-radioT,2*radioT,2*radioT);
                         */
                    }
                    coloreado.paint();
                    for(var n = 0;n<3;n++)
                        paleta.drawImage("./palet/"+n+"Paleta.bmp",440,n*128,128,128);
                    paleta.setColor("#"+toHex(tmpColo[2])+""+toHex(tmpColo[1])+""+toHex(tmpColo[0]));
                    for(var n = 1;n<11;n++){
                        if(fig==0)
                            paleta.drawRect(440,384+n*(n+1),2*n,2*n);
                        else
                            paleta.drawOval(440,384+n*(n+1),2*n,2*n);
                    }
                    if(escogeColor){
                        paleta.drawImage("./palet/"+fondColor+"-"+fondColor2+".bmp",0,0,256,256);
                        paleta.setColor("black");
                        paleta.drawString(fondColor2+"",10,10);
                    }
                    paleta.setColor("#"+toHex(tmpColo[2])+""+toHex(tmpColo[1])+""+toHex(tmpColo[0]));
                    if(fig==0)
                        paleta.fillRect(x-radioFig,y-radioFig,2*radioFig,2*radioFig);
                    else
                        paleta.fillEllipse(x-radioFig,y-radioFig,2*radioFig,2*radioFig);
                    paleta.paint();
                }
                function MazeTales(){
                    pintar = true;
                    damePuntero();
                }
                //Variables Snake
                var m = 5;//modula el coutdown
                var comidaTiempo = 0;
                var comidaX = Math.floor(400*Math.random());
                var comidaY = Math.floor(400*Math.random());
                var comio = false;
                var minutos = 0,segundos = 0,horas =0;
                var relojito = "";
                var reloj;//El timer(reloj)
                var timer;//El timer(Thread)
                var pausa = false;
                var pausaMov = 0;
                var jugando = false;
                var maze = false;
                var mouse = false;
                var circulo = true;
                var click = false;
                var puntos = 0;
                var js = new jsGraphics("juego");
                var snake = new Array("200,200","200,210","200,220","200,230");
                var dire = 1;
                var lev = 4;
                var clicked = false;//variable que controla si es drag o no
                var x = 0;
                var y = 0;
                function KeyPressed(evt){
                    var keyP = (evt)?evt.which:window.event.keycode;
                    switch(keyP){
                        case 38://arriba
                            if(dire!=4)
                                dire = 1;
                            break;
                        case 39://der
                            if(dire!=3)
                                dire = 2;
                            break;
                        case 37://iz
                            if(dire!=2)
                                dire = 3;
                            break;
                        case 40://ab
                            if(dire!=1)
                                dire = 4;
                            break;
                        case 13:
                            pausa = !pausa;
                            if(pausa)
                                break;
                            if(pintar){
                                //guardar
                                pintar = false;
                                escogeColor = false;
                                escogioColor = true;
                                LogOut();
                            }
                    }
                }
                function DesClickMouse(evt){
                    if(!evt)evt = window.event;
                    x = evt.clientX;
                    y = evt.clientY;
                    clicked = false;
                }
                function ClickMouse(evt){
                    clicked = true;
                    if(!evt)evt = window.event;
                    x = evt.clientX;
                    y = evt.clientY;
                    if(jugando)
                        pausa = !pausa;
                    if(pintar && x>=440 && x<(440+128) && y>=0 && y<384){
                        escogeColor = true;
                        fondColor = Math.floor(y/128);
                        fondColor2 =Math.floor(16*Math.floor((y%128)/8))+Math.floor((x-440)/8);
                        tmpColo[fondColor]=fondColor2;
                    }
                    if(escogeColor && x>=0 && x<256 && y>=0 && y<256){
                        tmpColo[(fondColor+2)%3]=x;
                        tmpColo[(fondColor+1)%3]=y;
                        escogeColor = false;
                        //alert(tmpCol[0]+" "+tmpCol[1]+" "+tmpCol[2]);
                    }
                    if(pintar){
                        for(var n = 1;n<11;n++){
                            var xCir = 440+n;
                            var yCir = 384+n*(n+1)+n;
                            if(pertenece(x,y,xCir,yCir,n))
                                radioFig = n;
                        }
                    }
                }
                function pertenece(a,b,c,d,e){
                    return Math.sqrt(Math.pow(b-d,2)+Math.pow(a-c,2))<=e;
                }
                function MoverMouse(evt){
                    if(!evt)evt = window.event;
                    x = evt.clientX;
                    y = evt.clientY;
                    if(clicked && pintar && !escogeColor && x<=420 && x>=20 && y<=420 && y>=20){
                        coloreado.setColor("#"+toHex(tmpColo[2])+""+toHex(tmpColo[1])+""+toHex(tmpColo[0]));
                        if(fig==0)
                            coloreado.fillRect(x-radioFig,y-radioFig,2*radioFig,2*radioFig);
                        else
                            coloreado.fillOval(x-radioFig,y-radioFig,2*radioFig,2*radioFig);
                        var talesT = new Array(vectorMaze.length+1);
                        talesT[0]=x+","+y+","+fig+","+radioFig+",#"+toHex(tmpColo[2])+""+toHex(tmpColo[1])+""+toHex(tmpColo[0]);
                        for(var n = 0;n<vectorMaze.length;n++)
                            talesT[n+1]=vectorMaze[n];
                        vectorMaze = talesT;
                        coloreado.paint();
                    }

                    if(!clicked && pintar)
                        damePuntero();
                }
                var count = true;

                function LogOut(){
                    if(pintar){
                        pintar = false;
                        pinto = true;
                    }
                    /*FB.logout(function(response) {

            });
                     */

                    puntos = 0;
                    snake = new Array("100,100","100,110","100,120","100,130");
                    dire = 1;
                    if(count){
                        countDown();
                        count = false;
                        js.clear();
                        js.paint();
                        var ejem = setTimeout("LogOut()",5000);
                    }else{
                        m=5;
                        count = true;
                        jugando = true;
                        timer = setInterval("Jugar()",200/lev);
                        reloj = setInterval("Reloj()",1000);
                    }
                }
                function Reloj(){
                    if(!pausa && jugando)
                        segundos++;
                    if(segundos==60){
                        segundos = 0;
                        minutos++;
                        if(minutos==60)horas++;
                    }
                    relojito = ((horas<10)?"0"+horas:horas)+":"+((minutos<10)?"0"+minutos:minutos)+":"+((segundos<10)?"0"+segundos:segundos);
                }
                function countDown(){
                    js.clear();
                    js.setColor("green");
                    js.drawString("Contando "+m,80,80);
                    js.paint();
                    m-=1;
                    if(m<1)return;6
                    var aja = setTimeout("countDown()",1000);
                }
                function Jugar(){
                    if(!jugando){
                        clearInterval(reloj);
                        clearInterval(timer);
                        horas = 0;
                        segundos =0;
                        minutos = 0;
                        alert("Lograste "+puntos+" Puntos en "+relojito+" tiempo!!!");
                        relojito="00:00:00";
                    }else{//jugando todavia
                        if(pausa)
                            pausaMov=(pausaMov+10)%500;
                        else{
                            comidaTiempo+=1;
                            if(comidaTiempo%((1<<6)+20/lev)==0){
                                do{
                                    comidaX = Math.floor(Math.random()*380)+20;
                                    comidaY = Math.floor(Math.random()*380)+20;
                                }while(comidaX<10 || comidaY<10);
                                comio = false;
                            }
                            var comioT = false;
                            if(!mouse){
                                var tx = parseInt(snake[0].substring(0,snake[0].indexOf(",")));
                                var ty = parseInt(snake[0].substring(snake[0].indexOf(",")+1,snake[0].length));
                                switch(dire){
                                    case 1://a
                                        ty-=10;
                                        break;
                                    case 2://d
                                        tx+=10;
                                        break;
                                    case 3://i
                                        tx-=10;
                                        break;
                                    case 4://abajo
                                        ty+=10;
                                        break;
                                }
                                if(Math.sqrt(Math.pow(comidaX-(tx+2.5),2)+Math.pow(comidaY-(ty+2.5),2))<7.5){//COMIO!!!!
                                    comioT = true;
                                    comio = true;
                                    do{
                                        comidaX = Math.floor(Math.random()*380)+20;
                                        comidaY = Math.floor(Math.random()*380)+20;
                                    }while(comidaX<10 || comidaY<10);
                                    comidaTiempo=((1<<6)+20/lev)-1;
                                    puntos+=10;
                                }
                                var tmpT = new Array((comioT)?snake.length+1:snake.length);
                                tmpT[0]=tx+","+ty;
                                for(var n = 0;n<tmpT.length-1;n++)
                                    tmpT[n+1] = snake[n];
                                snake = tmpT;
                            }else{//con mouse
                                var tx = parseInt(snake[0].substring(0,snake[0].indexOf(",")));
                                var ty = parseInt(snake[0].substring(snake[0].indexOf(",")+1,snake[0].length));
                                try{
                                    var tx1 = tx+Math.floor((10.0*(x-tx-5))/dist(x,y,tx+5,ty+5));
                                    var tx2 = ty+Math.floor((10.0*(y-ty-5))/dist(x,y,tx+5,ty+5));
                                    if(Math.sqrt(Math.pow(comidaX-(tx1+2.5),2)+Math.pow(comidaY-(tx2+2.5),2))<7.5){//COMIO!!!!
                                        comioT = true;
                                        comio = true;
                                        do{
                                            comidaX = Math.floor(Math.random()*380)+20;
                                            comidaY = Math.floor(Math.random()*380)+20;
                                        }while(comidaX<10 || comidaY<10);
                                        comidaTiempo=((1<<6)+20/lev)-1;
                                        puntos+=10;
                                    }
                                }catch(Error){
                                    alert(Error);
                                }
                                var tmpT = new Array((comioT)?snake.length+1:snake.length);
                                tmpT[0]=tx1+","+tx2;
                                for(var n = 0;n<tmpT.length-1;n++)
                                    tmpT[n+1] = snake[n];
                                snake = tmpT;
                            }
                            /*
            var tx = parseInt(snake[0].substring(0,snake[0].indexOf(",")));
            var ty = parseInt(snake[0].substring(snake[0].indexOf(",")+1,snake[0].length));
            for(var n = 1;n<snake.length;n++){
            var tx1 = parseInt(snake[n].substring(0,snake[n].indexOf(",")));
            var ty1 = parseInt(snake[n].substring(snake[n].indexOf(",")+1,snake[n].length));
            }
                             */

                            if(maze){

                                for(var n = 0;n<snake.length;n++){
                                    var tx = parseInt(snake[n].substring(0,snake[n].indexOf(",")));
                                    var ty = parseInt(snake[n].substring(snake[n].indexOf(",")+1,snake[n].length));
                                    tx = (tx>=415)?(tx%415+20):tx;
                                    ty = (ty>=415)?(ty%415+20):ty;
                                    if(tx<=15)tx+=410;
                                    if(ty<=15)ty+=405;
                                    snake[n]=tx+","+ty;
                                }

                            }else{//bounds
                                var tx = parseInt(snake[0].substring(0,snake[0].indexOf(",")));
                                var ty = parseInt(snake[0].substring(snake[0].indexOf(",")+1,snake[0].length));
                                if(tx<=15 || ty<=15 || tx>=415 || ty>=415)jugando = false;
                            }

                        }
                        repain();
                    }
                }

                function dist(a,b,c,d){
                    return Math.sqrt(Math.pow(a-b,2)+Math.pow(c-d,2));
                }

                function repain(){
                    js.clear();
                    //js.drawImage("./prof.jpg");
                    if(!escogioColor){
                        js.setColor("red");
                        js.fillRect(20,20,400,400);
                    }
                    if(escogioColor){
                        coloreado.clear();
                        for(var n = 0;n<vectorMaze.length;n++){
                            var primComa = parseInt(vectorMaze[n].indexOf(","));
                            var segunComa = parseInt(vectorMaze[n].indexOf(",",primComa+1));
                            var tercerComa = parseInt(vectorMaze[n].indexOf(",",segunComa+1));
                            var cuarComa = parseInt(vectorMaze[n].indexOf(",",tercerComa+1));
                            var xT = parseInt(vectorMaze[n].substring(0,primComa));
                            var yT = parseInt(vectorMaze[n].substring(primComa+1,segunComa));
                            var figT =parseInt(vectorMaze[n].substring(1+segunComa,tercerComa));
                            var radioT = parseInt(vectorMaze[n].substring(1+tercerComa,cuarComa));
                            coloreado.setColor(vectorMaze[n].substring(cuarComa+1,vectorMaze[n].length));
                            //alert (xT+" "+yT+" "+figT+" "+radioT+" "+vectorMaze[n].substring(cuarComa+1,vectorMaze[n].length))
                            if(figT==0)
                                coloreado.fillRect(xT-radioT,yT-radioT,2*radioT,2*radioT);
                            else
                                coloreado.fillOval(xT-radioT,yT-radioT,2*radioT,2*radioT);

                        }
                        coloreado.paint();
                    }
                    js.setColor("blue");
                    for(var n = 0;n<snake.length;n++)
                        js.drawEllipse(parseInt(snake[n].substring(0,snake[n].indexOf(","))),parseInt(snake[n].substring(snake[n].indexOf(",")+1,snake[n].length)),10,10);

                    if(!comio){
                        js.setColor("#ffffff");
                        js.fillEllipse(comidaX,comidaY,5,5);
                    }
                    if(pausa){
                        js.setColor("#ff00ff");
                        js.drawString("Pausa",pausaMov,100);
                    }
                    if(mouse){
                        js.setColor("green");
                        js.drawEllipse(x,y,10,10);
                    }
                    js.setColor("green");
                    js.drawString(relojito,500,20);
                    js.drawString(puntos+" Puntos!!",500,60);
                    js.paint();
                }
                function venga(){
                    js.setColor("#ff00ff");
                    js.fillRect(100,100,100,100);
                    if(jugando){
                        js.drawString("bien",400,400);
                    }else{
                        js.drawString("Prepreprepre",400,400);
                    }
                    //if(x!=0 || y!=0)js.fillEllipse(x,y,10,10);
                    js.paint();
                }
            </script>
        </div>
        <div align=right id="Menu">
            <font color="red">Menu</font><br>
            <br>
            <input type=submit value="Jugar" onclick="LogOut()">
            <br>
            <input type=submit value = "Crear Maze" onclick="MazeTales()">
        </div>

    </body>
</html>