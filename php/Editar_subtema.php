<?php
session_start();
include('conexion.php');
 $consulta= "select idSubtemas,subtemas.nombre as nomsub,Fecha_pre,Fecha_real,Actividad,Recurso,unidad from unidad,materias,nrc,subtemas where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".json_decode($_POST['materia'], true)."' and unidad='".json_decode($_POST['unidad'], true)."' and  unidad=idUnidad";
                       $ejecutar=$blabla->query($consulta);


?>
<table class="tabla" id="tablasubtema">
<thead>
<tr><th colspan='5'>Subtemas</th></tr>
<tr>

<th width="100px">Nombre</th>
<th width="100px">Fecha programada</th>
<th width="100px">Fecha real</th>
<th width="100px">Actividad</th>
<th width="100px">Recusro</th>

</tr>
</thead>
<tbody>
<?php
while ($fila=$ejecutar->fetch_assoc()) {
	echo '<tr id="'.$fila['idSubtemas'].''.$fila['unidad'].'"> 
	<td width="100px">'.$fila['nomsub'].'</td>
	<td width="100px">'.$fila['Fecha_pre'].'</td>
	<td width="100px">'.$fila['Fecha_real'].'</td>
	<td width="100px">'.$fila['Actividad'].'</td>
	<td width="100px">'.$fila['Recurso'].'</td>
    <td width="30px" ><a onclick="editarRegistros(this,'.$fila['idSubtemas'].','.$fila['unidad'].')"><img src="imagenes/pencil.png"/></a></td>
    <td width="30px" ><a onclick="Eliminar_reg(this,'.$fila['idSubtemas'].','.$fila['unidad'].')"><img src="imagenes/trash.png"/></a></td>
	
	</tr>';
}
?>
 
</tbody>

</table>

<script >
	
	
function Eliminar_reg(json,idS,idU) {
var Edicion="DELETE FROM subtemas WHERE idSubtemas='"+idS+"' and unidad='"+idU+"'  ";
Edicion=JSON.stringify(Edicion);
MUS="se";
MUS=JSON.stringify(MUS);
MUSC=JSON.stringify(idS+""+idU);
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

var sub='',
    uni='';
function editarRegistros(json,idS,idU) {
	sub=idS;
	uni=idU;
            cont=0;
            registro='';
            if (editarSubtema == false) {
var nodoTd = json.parentNode; //Nodo TD
var nodoTr = nodoTd.parentNode; //Nodo TR

var nodosEnTr = nodoTr.getElementsByTagName('td');
    
    nombres = nodosEnTr[0].textContent;
    fecha_programada = nodosEnTr[1].textContent;
    fecha_real = nodosEnTr[2].textContent;
    Actividad = nodosEnTr[3].textContent;
   Recurso = nodosEnTr[4].textContent;
    
var nuevoCodigoHtml =
'<td><input type="text" class="registros" name="nombres" id="NS" value="'+nombres+'" size="5"</td>'+
'<td><input type="date" class="registros" name="fecha_programada" id="FPS" value="'+fecha_programada+'" size="5"</td>'+
'<td><input type="date" class="registros" name="fecha_real" id="FRS" value="'+fecha_real+'" size="5"</td>'+
'<td><input type="text" class="registros" name="Actividad" id="AS" value="'+Actividad+'" size="5"</td>'+
'<td><input type="text" class="registros" name="Recurso" id="RS" value="'+Recurso+'" size="5"</td>'+
'<td width="30px"><a onclick="GuardarCambiosS('+idS+','+idU+')"><img src="imagenes/checked.png"/></a></td>'+
'<td id="cancelars" width="30px"><a onclick="cancelars(this,'+idS+','+idU+');"><img src="imagenes/band-aid.png"/></a></td>';
nodoTr.innerHTML = nuevoCodigoHtml;
editarSubtema = true;
}
else {alert ('Solo se puede editar una línea. Recargue la página para poder editar otra');
}
        }
function CambiosTablaS(subtema) {
	
	var nodoTr=document.getElementById(subtema);
	
	var nodosEnTr = nodoTr.getElementsByClassName('registros');
    nombres = nodosEnTr[0].value;
    fecha_programada = nodosEnTr[1].value;
    fecha_real = nodosEnTr[2].value;
    Actividad = nodosEnTr[3].value;
   Recurso = nodosEnTr[4].value;
    
var nuevoCodigoHtml =
'<td width="100px">'+nombres+'</td>'+
'<td width="100px">'+fecha_programada+'</td>'+
'<td width="100px">'+fecha_real+'</td>'+
'<td width="100px">'+Actividad+'</td>'+
'<td width="100px">'+Recurso+'</td>'+
'<td width="30px" ><a onclick="editarRegistros(this,'+sub+','+uni+')"><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_registro(this,'+sub+','+uni+')"><img src="imagenes/trash.png"/></a></td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
editarSubtema=false;
}
function GuardarCambiosS(claveS,claveU){
var NS = document.getElementById("NS").value;
var FPS = document.getElementById("FPS").value;
var FRS = document.getElementById("FRS").value;
var AS = document.getElementById("AS").value;
var RS = document.getElementById("RS").value;

var Edicion="update subtemas set nombre='"+NS+"',Fecha_pre='"+FPS+"',Fecha_real='"+FRS+"',Actividad='"+AS+"',Recurso='"+RS+"' where idSubtemas='"+claveS+"' and unidad='"+claveU+"'";


Edicion=JSON.stringify(Edicion);
MUS="s";
MUS=JSON.stringify(MUS);
MUSC=JSON.stringify(claveS+""+claveU);
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
function cancelars(json,idS,idU) {
    if (editarSubtema==true) {
    var nodoTd = json.parentNode; //Nodo TD
    var nodoTr = nodoTd.parentNode;
    
    var nuevoCodigoHtml = 
'<td width="100px">'+nombres+'</td>'+
'<td width="100px">'+fecha_programada+'</td>'+
'<td width="100px">'+fecha_real+'</td>'+
'<td width="100px">'+Actividad+'</td>'+
'<td width="100px">'+Recurso+'</td>'+
'<td width="30px" ><a onclick="editarRegistros(this)" ><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_reg(this,'+idS+','+idU+')"><img src="imagenes/trash.png"/></a></td>';


 
nodoTr.innerHTML = nuevoCodigoHtml;
    }
    editarSubtema=false;
}</script>