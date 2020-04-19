<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>EL GATO</title>
    <link rel="stylesheet" href="css/gato.css">
  </head>

  <script>
  var mapa = [0, 0, 0, 0, 0, 0, 0, 0, 0,];
  var jugador = 1;
  function dibujar(){
    var inicio = "";
    var x = "X";
    var o = "O";
    for(i=0; i<9; i++){
      if(mapa[i] == 0) document.getElementById("c"+i).innerHTML = inicio;
      if(mapa[i] == 1) document.getElementById("c"+i).innerHTML = x;
      if(mapa[i] == 2) document.getElementById("c"+i).innerHTML = o;
    }
  }

  function pcelda(celda){
    if (mapa[celda]==0) {
      if (jugador==1){
        mapa[celda]=1;
        jugador=2;
      }
      else {
        mapa[celda]=2;
        jugador=1;
      }
    }
    else {
      window.alert("No puedes pulsar sobre una celda ocupada");
    }

    dibujar();
    var r = ganador();
    switch(r){
      case 0:
      break;
      case 1:
      window.alert("¡Ganó el jugador 1!");
      break;
      case 2:
      window.alert("¡Ganó el jugador 2!");
      break;
      case 3:
      window.alert("¡Empate!");
      break;
    }
  }

  function ganador(){
    var numEspacios=0;
    for(i=0; i<9; i++){
      if(mapa[i] == 0) numEspacios++;
    }

    // Las líneas horizontales
    if(mapa[0] == mapa[1] && mapa[1] == mapa[2] && mapa[0] !=0) return mapa[0];
    if(mapa[3] == mapa[4] && mapa[4] == mapa[5] && mapa[3] !=0) return mapa[3];
    if(mapa[6] == mapa[7] && mapa[7] == mapa[8] && mapa[6] !=0) return mapa[6];

    //Las líneas verticales
    if(mapa[0] == mapa[3] && mapa[3] == mapa[6] && mapa[0] !=0) return mapa[0];
    if(mapa[1] == mapa[4] && mapa[4] == mapa[7] && mapa[1] !=0) return mapa[1];
    if(mapa[2] == mapa[5] && mapa[5] == mapa[8] && mapa[2] !=0) return mapa[2];

    //Las diagonales
    if(mapa[0] == mapa[4] && mapa[4] == mapa[8] && mapa[0] !=0) return mapa[0];
    if(mapa[2] == mapa[4] && mapa[4] == mapa[6] && mapa[2] !=0) return mapa[2];

    if (numEspacios > 0){
      return 0;
    }
    else {
      return 3;
    }
  }
  </script>

  <body>

    <center>
      <h1>JUEGO DEL GATO</h1>
      <h4>Jugador 1 = X &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jugador 2 = O</h4>
    </center>

    <table align="center" border="1" style="font-size:50px">
      <tr>
        <td width="100" height="100" id="c0" onclick="pcelda(0)" align="center"></td>
        <td width="100" height="100" id="c1" onclick="pcelda(1)" align="center"></td>
        <td width="100" height="100" id="c2" onclick="pcelda(2)" align="center"></td>
      </tr>
      <tr>
        <td width="100" height="100" id="c3" onclick="pcelda(3)" align="center"></td>
        <td width="100" height="100" id="c4" onclick="pcelda(4)" align="center"></td>
        <td width="100" height="100" id="c5" onclick="pcelda(5)" align="center"></td>
      </tr>
      <tr>
        <td width="100" height="100" id="c6" onclick="pcelda(6)" align="center"></td>
        <td width="100" height="100" id="c7" onclick="pcelda(7)" align="center"></td>
        <td width="100" height="100" id="c8" onclick="pcelda(8)" align="center"></td>
      </tr>
    </table>

    <table align="center" border="0">
      <tr>
        <td width="300"  align="center"><br />
          <a href="javascript:location.reload()">
            <button>Reiniciar</button></a>
        </td>
      </tr>
    </table>

  </body>
</html>
