<?php
session_start();
include('conexion.php');


 $consulta="select idUnidad,idMateria,unidad.nombre as NombreUni,Evaluacion_programado,Evaluacion_real from unidad,materias,nrc where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".json_decode($_POST['id'], true)."'";
    $ejecutar=$blabla->query($consulta);


?>
<table id="TablaUnidad" class="tabla">
<thead>
<tr><th colspan='5'>Unidades</th></tr>
<tr>

<th width="100px">Nombre</th>
<th width="100px">Fecha programada</th>
<th width="100px">Fecha real</th>

</tr>
</thead>
<tbody>
<?php
while ($fila=$ejecutar->fetch_assoc()) {
	echo '<tr id="'.$fila['idMateria'].$fila['idUnidad'].'"> 
	<td width="100px">'.$fila['NombreUni'].'</td>
	<td width="100px">'.$fila['Evaluacion_programado'].'</td>
	<td width="100px">'.$fila['Evaluacion_real'].'</td>
	
	<td width="30px" ><a onclick="editarRegistroU(this,'.$fila['idUnidad'].','.$fila['idMateria'].')" ><img src="imagenes/pencil.png"/></a></td>
	<td width="30px"><a onclick="Tsubtema('.$fila['idUnidad'].','.$fila['idMateria'].')"><img src="imagenes/eye.png"/></a></td>
	<td width="30px" ><a onclick="Eliminar_registro(this,'.$fila['idMateria'].','.$fila['idUnidad'].')"><img src="imagenes/trash.png"/></a></td>
	</tr>';
	
}

?>
</tbody>

</table>
<script>
function Eliminar_registro(json,idM,idU) {
var Edicion="DELETE FROM unidad WHERE idUnidad='"+idU+"' and idMateria='"+idM+"'";
Edicion=JSON.stringify(Edicion);
MUS="su";
MUS=JSON.stringify(MUS);
MUSC=JSON.stringify(idM+""+idU);
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

    var nombreu="",
    fecha_programada="",
    fecha_real="",
    MateriaU="",
    Unidad="",
    UltimouIDU="" ,
    uni="",
    mat="";

	function Tsubtema(unidad,materia){
		var Mauni=materia+""+unidad;

		
		document.getElementById(Mauni).style.backgroundColor="#66ff33";
	if (!UltimouIDU=="" && UltimouIDU!=Mauni) {
	   document.getElementById(UltimouIDU).style.backgroundColor="#fff";
	}
	UltimouIDU=Mauni;
        unidad=JSON.stringify(unidad);
        materia=JSON.stringify(materia);
        $.ajax({
     type:'post',
     cache:false,
     url:"php/Editar_subtema.php",
     data:{materia:materia, unidad:unidad},
     success:function(url){$('#Subtema').html(url);}
      

        });
        editarSubtema=false;
		//$('#Unidad').load('php/Editar_unidad.php');
	}
	function editarRegistroU(json,uni1,uni2) {
            cont=0;
	    uni=uni2;
	    mat=uni1;
            registro='';
             MateriaU=uni2;
             Unidad=uni1;
            if (editarunidad == false) {
var nodoTd = json.parentNode; //Nodo TD
var nodoTr = nodoTd.parentNode; //Nodo TR

var nodosEnTr = nodoTr.getElementsByTagName('td');
    
    nombreu = nodosEnTr[0].textContent;
    fecha_programada = nodosEnTr[1].textContent;
    fecha_real = nodosEnTr[2].textContent;
    
var nuevoCodigoHtml =
'<td><input type="text" class="registrou" name="nombreu" id="NU" value="'+nombreu+'" size="5"</td>'+
'<td><input type="date" class="registrou" name="fecha_programada" id="FPU" value="'+fecha_programada+'" size="5"</td>'+
'<td><input type="date" class="registrou" name="fecha_real" id="FRU" value="'+fecha_real+'" size="5"</td>'+
'<td width="30px"><a onclick="GuardarCambiosU('+uni2+''+uni1+')"><img src="imagenes/checked.png"/></a></td>'+
'<td id="cancelarU" width="30px"><a onclick="cancelarU(this, '+uni1+','+uni2+');"><img src="imagenes/band-aid.png"/></a></td>';
nodoTr.innerHTML = nuevoCodigoHtml;
editarunidad = true;
}
else {alert ('Solo se puede editar una línea. Recargue la página para poder editar otra');
}
        }
function cancelarU(json,uni1,uni2) {
    if (editarunidad==true) {
    var nodoTd = json.parentNode; //Nodo TD
    var nodoTr = nodoTd.parentNode;
   
    var nuevoCodigoHtml = 
'<td width="100px">'+nombreu+'</td>'+
'<td width="100px">'+fecha_programada+'</td>'+
'<td width="100px">'+fecha_real+'</td>'+
'<td width="30px" ><a onclick="editarRegistroU(this,'+uni1+','+uni2+')" ><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px"><a onclick="Tsubtema('+uni1+','+uni2+')"><img src="imagenes/eye.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_registro(this,'+uni1+','+uni2+')"><img src="imagenes/trash.png"/></a></td>';
nodoTr.innerHTML = nuevoCodigoHtml;
    }
    editarunidad=false;
}
function CambiosTablaU(unidad) {
	
	var nodoTr=document.getElementById(unidad);
	
	var nodosEnTr = nodoTr.getElementsByClassName('registrou');
	
    nombreu = nodosEnTr[0].value;
    fecha_programada = nodosEnTr[1].value;
    fecha_real = nodosEnTr[2].value;
    var nuevoCodigoHtml = 
'<td width="100px">'+nombreu+'</td>'+
'<td width="100px">'+fecha_programada+'</td>'+
'<td width="100px">'+fecha_real+'</td>'+
'<td width="30px" ><a onclick="editarRegistroU(this,'+mat+','+uni+')" ><img src="imagenes/pencil.png"/></a></td>'+
'<td width="30px"><a onclick="Tsubtema('+mat+','+uni+')"><img src="imagenes/eye.png"/></a></td>'+
'<td width="30px" ><a onclick="Eliminar_registro(this,'+mat+','+uni+')"><img src="imagenes/trash.png"/></a></td>';
 
nodoTr.innerHTML = nuevoCodigoHtml;
editarunidad=false;
}
function GuardarCambiosU(claveU){

var NU = document.getElementById("NU").value;
var FPU = document.getElementById("FPU").value;
var FRU = document.getElementById("FRU").value;

var Edicion="update unidad set nombre='"+NU+"',Evaluacion_programado='"+FPU+"',Evaluacion_real='"+FRU+"' where idMateria='"+MateriaU+"' and idUnidad='"+Unidad+"'";


Edicion=JSON.stringify(Edicion);
MUS="u";
MUS=JSON.stringify(MUS);
MateriaU=JSON.stringify(MateriaU);
MUSC=JSON.stringify(claveU);

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