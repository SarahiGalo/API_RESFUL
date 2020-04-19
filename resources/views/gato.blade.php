<!DOCTYPE html>
<html>
<head>
<title>Gato</title>
<meta charset="UTF-8" />
<meta name="author" content="MOC CodeMadrid y Ángel Puente" />
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<script>
var mapa = [0, 0, 0, 0, 0, 0, 0, 0, 0,];
var jugador = 1;
function dibujar(){
 for(i=0; i<9; i++){
   if(mapa[i] == 0) document.getElementById("c"+i).style="background-color: white";
   if(mapa[i] == 1) document.getElementById("c"+i).style="background-color: red";
   if(mapa[i] == 2) document.getElementById("c"+i).style="background-color: blue"; 
 }
}
function pcelda(celda){
if (mapa[celda]==0) {
 if (jugador==1){
 mapa[celda]=1;
 jugador=2;
 } else {
 mapa[celda]=2;
 jugador=1;
 }
} else {
window.alert("No puedes pulsar sobre una celda coloreada");
}
dibujar();
 var r = ganador();
 switch(r){
  case 0:
   break;
  case 1:
   window.alert("¡Ganó el rojo!");
   break;
  case 2:
   window.alert("¡Ganó el azul!");
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
} else {
return 3;
}
}
</script>
</head>

<body>
<table align="center" border="0">
<tr>
<td width="300" align="center"><h1>JUEGO DEL GATO</h></td>
</tr>
</table>
<br><br>
<table align="center" border="1">
 <tr>
  <td width="100" height="100" id="c0" onclick="pcelda(0)"></td>
  <td width="100" height="100" id="c1" onclick="pcelda(1)"></td>
  <td width="100" height="100" id="c2" onclick="pcelda(2)"></td>
 </tr>
 <tr>
  <td width="100" height="100" id="c3" onclick="pcelda(3)"></td>
  <td width="100" height="100" id="c4" onclick="pcelda(4)"></td>
  <td width="100" height="100" id="c5" onclick="pcelda(5)"></td>
 </tr>
 <tr>
  <td width="100" height="100" id="c6" onclick="pcelda(6)"></td>
  <td width="100" height="100" id="c7" onclick="pcelda(7)"></td>
  <td width="100" height="100" id="c8" onclick="pcelda(8)"></td>
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
