<?php
session_start();
include('conexion.php');

$materia="select idmaterias,materias.Nombre as NombreMat, Creditos, Edificio,Carrera ,(select count(*) from unidad where idMateria=idmaterias) as uni,(select count(*) from subtemas,unidad where idMateria=idmaterias and unidad=idUnidad) as sub from materias,nrc where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias";
$ejecutar=$blabla->query($materia);

$consultaCarrera="select * from carreras";
$carrera=$blabla->query($consultaCarrera);

$carreras=array();
while($fila2=$carrera->fetch_assoc()){
array_push($carreras,$fila2['Nombre']);
}
$jsonCarrera=json_encode($carreras);
?>
<div id="Materia">
<table id="Tabla_materia" class="tabla">
<thead>
<tr><th colspan='8'>Avance programatico</th></tr>
<tr>
<th width="100px">Clave</th>
<th width="100px">Nombre</th>
<th width="50px">Creditos</th>
<th width="50px">Edificio</th>
<th width="100px">Carrera</th>
</tr>
</thead>
<tbody>
<?php
while ($fila=$ejecutar->fetch_assoc()) {
	echo '<tr id="'.$fila['idmaterias'].'"> 
	<td width="100px">'.$fila['idmaterias'].'</td>
	<td width="100px">'.$fila['NombreMat'].'</td>
	<td width="50px">'.$fila['Creditos'].'</td>
	<td width="50px">'.$fila['Edificio'].'</td>
	<td width="100px">'.$fila['Carrera'].'</td>
	<td width="30px" ><a onClick="editarRegistroM(this)"><img src="imagenes/pencil.png" alt="Editar"/></a></td>
        <td width="30px"><a onclick="return complete('.$fila['uni'].','.$fila['sub'].');" target="_blank" href="php/prueba.php?Clave='.$fila['idmaterias'].'"><img src="imagenes/printer.png"/></a></td>
	<td width="30px"><a onclick="Tunidad('.$fila['idmaterias'].')"><img src="imagenes/eye.png"/></a></td>
	<td width="30px" ><a onclick="Eliminar_Materia(this,'.$fila['idmaterias'].')"><img src="imagenes/trash.png"/></a></td>
	</tr>';
}
?>
</tbody>

</table>
<div id='Unidad'> </div>
<div id='Subtema'> </div>
<div id='Cambios'></div>
</div>
<script>
	function complete(uni, sub) {
		if (uni > 0 & sub > 0) {
	              return true;
		}else{
		      swal("Al avance le faltan unidades o subtemas REVISALO");
		      return false;
		}
	}
function Eliminar_Materia(json,idM) {
var Edicion="DELETE FROM materias WHERE idmaterias='"+idM+"'";
Edicion=JSON.stringify(Edicion);
MUS="sm";
MUS=JSON.stringify(MUS);
MUSC=JSON.stringify(idM);
$.ajax({
            type:'post',
             cache:false,
             url: "php/Modificaciones.php",
            data: {Edicion:Edicion,MUS:MUS,MUSC:MUSC},
            success:function(url){
		
            $('#Cambios').html(url);
               }
             });


}

    var editar=false,
    editarunidad=false,
    editarSubtema=false,
    clave='',
    nombre='',
    creditos='',
    edificio='',
    carrera='',
    cont=0,
    registro='',
    UltimoID='',
    MUS="",
    jsonCarreras=eval(<?php echo $jsonCarrera;?>);
    function recorrerArreglo(arreglo) {
        if (arreglo.length>cont) {
            registro=registro+("<option value='"+jsonCarreras[cont]+"'>"+jsonCarreras[cont]+"</option>");
            cont++;
        recorrerArreglo(arreglo);
        }
        return registro;
    }
	function Tunidad(id){
        
	document.getElementById(id).style.backgroundColor="#66ff33";
	if (!UltimoID=="" && UltimoID!=id) {
	   document.getElementById(UltimoID).style.backgroundColor="#fff";
	   if (UltimoID) {
		//code
	   }
	}
	
	UltimoID=id;
        id=JSON.stringify(id);
        $.ajax({
     type:'post',
     cache:false,
     url:"php/Editar_unidad.php",
     data:{id:id},
     success:function(url){
     	$('#Unidad').html(url);
        $('#Subtema').html("");}
        });
	editarunidad=false;
	editarSubtema=false;
	}
        function editarRegistroM(json) {
            cont=0;
            registro='';
            if (editar == false) {
var nodoTd = json.parentNode; //Nodo TD
var nodoTr = nodoTd.parentNode; //Nodo TR

var nodosEnTr = nodoTr.getElementsByTagName('td');
    clave = nodosEnTr[0].textContent;
    nombre = nodosEnTr[1].textContent;
    creditos = nodosEnTr[2].textContent;
    edificio = nodosEnTr[3].textContent;
    carrera = nodosEnTr[4].textContent;
var nuevoCodigoHtml = '<td width="10px"><div class="registrom" id="CLM" >'+clave+'</div></td>'+
'<td><input class="registrom" type="text" name="nombre" id="NM" value="'+nombre+'" size="5"</td>'+
'<td><input class="registrom" type="numbrer" name="creditos" id="CM" value="'+creditos+'" size="5"</td>'+
'<td><select class="registrom" id="EM"><option value="'+edificio+'" >('+edificio+')</option>'+  
                '<option value="A">A</option>'+
                '<option value="B">B</option>'+
                '<option value="C">C</option>'+
                '<option value="D">D</option>'+
                '<option value="E">E</option>'+
                '<option value="F">F</option>'+
                '<option value="G">G</option>'+
                '<option value="H">H</option>'+
                '<option value="I">I</option>'+
                '<option value="J">J</option>'+
                '<option value="K">K</option>'+
                '<option value="L">L</option>'+
                '<option value="M">M</option>'+
                '<option value="N">N</option>'+
                '<option value="O">O</option>'+
                '<option value="P">P</option>'+
                '</select></td>'+
'<td><select class="registrom" id="CAM"><option value="'+carrera+'">('+carrera+')</option>'+
                recorrerArreglo(jsonCarreras)+
                '</select></td>'+
'<td><a onclick="GuardarCambiosM();"><img src="imagenes/checked.png"/></a></td>'+
'<td id="canselar"><a onclick="cancelarM(this);"><img src="imagenes/band-aid.png"/></a></td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
editar = true;
}
else {alert ('Solo se puede editar una línea. Recargue la página para poder editar otra');
}
        }
function cancelarM(json) {
    if (editar==true) {
    var nodoTd = json.parentNode; //Nodo TD
    var nodoTr = nodoTd.parentNode;
  
    var nuevoCodigoHtml = '<td>'+clave+'</td>'+
'<td width="100px">'+nombre+'</td>'+
'<td width="50px">'+creditos+'</td>'+
'<td width="50px">'+edificio+'</td>'+
'<td width="100px">'+carrera+'</td>'+
'<td width="30px" ><a onClick="editarRegistroM(this)"><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px"><a target="_blank" href="php/prueba.php" ><img src="imagenes/printer.png"/></a></td>'+
'<td width="30px"><a onclick="Tunidad('+clave+')"><img src="imagenes/eye.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_Materia(this,'+clave+')"><img src="imagenes/trash.png"/></a></td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
    }
    editar=false;
}
function CambiosTablaM(materia) {
	
	var nodoTr=document.getElementById(materia);
	
	var nodosEnTr = nodoTr.getElementsByClassName('registrom');
	
    clave = nodosEnTr[0].innerText;
    nombre = nodosEnTr[1].value;
    creditos = nodosEnTr[2].value;
    edificio = nodosEnTr[3].value;
    carrera = nodosEnTr[4].value;
	var nuevoCodigoHtml = '<td>'+clave+'</td>'+
'<td width="100px">'+nombre+'</td>'+
'<td width="50px">'+creditos+'</td>'+
'<td width="50px">'+edificio+'</td>'+
'<td width="100px">'+carrera+'</td>'+
'<td width="30px" ><a onClick="editarRegistroM(this)"><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px"><a target="_blank" href="php/prueba.php?Clave='+clave+'"><img src="imagenes/printer.png"/></a></td>'+
'<td width="30px"><a onclick="Tunidad('+clave+')"><img src="imagenes/eye.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_Materia(this,'+clave+')"><img src="imagenes/trash.png"/></a></td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
editar=false;
}
function GuardarCambiosM(){
var CLM = document.getElementById("CLM").innerText;
var NM = document.getElementById("NM").value;
var CM = document.getElementById("CM").value;
var EM = document.getElementById("EM").value;
var CAM = document.getElementById("CAM").value;
var Edicion="update Materias set nombre='"+NM+"',creditos='"+CM+"',edificio='"+EM+"',carrera='"+CAM+"' where idMaterias='"+CLM+"'";

Edicion=JSON.stringify(Edicion);
MUS="m";
MUS=JSON.stringify(MUS);

var MUSC=JSON.stringify(CLM);

$.ajax({
            type:'post',
             cache:false,
             url: "php/Modificaciones.php",
            data: {Edicion:Edicion,MUS:MUS,MUSC:MUSC},
            success:function(url){
            $('#Cambios').html(url);
               }
             });
}

</script>
<style> 
.tabla{
	margin-right: 4px;
	float: left;
}
td img{
    height: 15px;
    width: 15px;
    cursor: pointer;
}
	</style>


