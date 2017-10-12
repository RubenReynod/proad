<?php
    include('conexion.php');
    session_start();
    if(!empty($_POST['nrc'])){
    $cadena=$_POST['nrc'];
    $_SESSION['nrc']=substr($cadena,0, strpos($cadena, '/'));
    $cadena=substr($cadena,strpos($cadena,'/')+1);
    $_SESSION['clave']=substr($cadena,0, strpos($cadena, '/'));
    $_SESSION['nombreMateria']=substr($cadena,strpos($cadena,'/')+1);
    }
    $consulta="select idUnidad,Ciclo_idCiclo,materias.nombre,idMaterias,unidad.nombre as NombreUni from unidad,materias,nrc where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".$_SESSION['clave']."'";
    $ejecutar=$blabla->query($consulta);
    $cont=0;
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Tabs - Simple manipulation</title>
  <link rel="stylesheet" href="css/jquery-ui.css">
  
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <style>
  .ui-tabs-vertical { width: 55em; }
  .ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: auto }
  .ui-tabs-vertical .unidad { clear: left; width: 150px;  height: auto; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
  .ui-tabs-vertical .unidad a { display:block; white-space: normal;}
  .ui-tabs-vertical .unidad .ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
  .ui-tabs-vertical .ui-tabs-panel { padding: 1em; float: left; width: 40em;}
  
  
  #add_tab { cursor: pointer; }
  
  #tabs{
    clear:left;
    float:left;
    width:  100%;
    height: 450px;
  }
  #tabs .subtema{
    width: 85%;
    height: 100%; 
  }
  .subtema form{
    position: relative;
    top: 0px;
  }
  #Siguiente{
    float: right;
  }
  .tab{
    background-color:transparent;
    border:none;
  }
  .ui-tabs-nav{
    background-color: transparent;
    border: none;
  }
  .tabla{
    clear: right;
    float: right;
  }
  .btn_guardar{
    float: right;
  }
 
    
  </style>
  <script>
 var tabTemplate = "<li><a href='#{href}'>#{label}</a> <a><img class='ui-icon' src='imagenes/Close.ico'/></a></li>",
      tabCounter = 1,
      lista = new Map(),
      tab=document.getElementsByClassName('subtema')[0].id,
      tabs=$("#"+tab).tabs();
      
  $( function() {
    $(".subtema").tabs();
    $("#tabs").tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $(".subtema li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    $("#tabs li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
    NextTab();
    $('#tabs a').click(function(){
        tab=$(this).attr('href').substring(1);
        tabs=$("#"+tab).tabs();
        console.log(tabs);
        NextTab();
    });
     
  var añopre=0, añore=0;
  var mespre=0, mesre=0;
  var diapre=0, diare=0;
  function fechapre(fecha) {
    var f = fecha.value+"";
   añopre=parseInt(f.substring(0,4));
   f = f.substring(f.indexOf("-")+1)+"";
   mespre=parseInt(f.substring(0,2));
   f = f.substring(f.indexOf("-")+1)+"";
   diapre=parseInt(f.substring(0,2));
  }
  function fechareal(fecha) {
   var f = fecha.value+"";
   añore=parseInt(f.substring(0,4));
   f = f.substring(f.indexOf("-")+1)+"";
   mesre=parseInt(f.substring(0,2));
   f = f.substring(f.indexOf("-")+1)+"";
   diare=parseInt(f.substring(0,2));
  }
  
    function NextTab() {
        $('#'+tab+' .btn_form').on('click',function(){
            var bandera=true,
            valores = new Array(lista.get(tab).size),
            cont=0;
               lista.get(tab).forEach(function(item){
                var campos=document.getElementById(item).getElementsByClassName('campo');
                     for (var i=0;i<campos.length;i++) {
                          if (campos[i].value=="") {
                              swal('Se encontro vacio el campo "'+campos[i].name+'" de "'+$("#"+item).attr("name")+'"');
                              bandera=false;
                              break;
                          }
                          else{
                            fechapre(campos[1]);
                            fechareal(campos[2]);
                            if (añore<añopre | mesre<mespre | diare<diapre) {
                                swal('La fecha programada no puede ser menor o igual verificalo de nuevo');
                                  bandera = false;
                                  break;
           }
      }
                     }
                     valores[cont]="('"+campos[0].value.replace(/'/gi,'´')+"','"+campos[1].value+"','"+campos[2].value+"','"+campos[3].value.replace(/'/gi,'´')+"','"+campos[4].value.replace(/'/gi,'´')+"','"+tab+"')";
                         cont++;
                });
               if (bandera){
                    confirmar(valores);
               }else if(bandera==false){
                    valores.length=0;
               }
    });
    }
    function confirmar(arreglo) {
    swal({
             title: 'Estas seguro que quieres realizar esta accion?',
             text: "",
             type: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Guardar',
             closeOnConfirm:false,
             closeOnCancel:false
    },function(isConfirm){
	    if (isConfirm) {
                  var idtabla = document.getElementById(tab).getElementsByTagName('table')[0].id;
                  idtabla=JSON.stringify(idtabla);
                  arreglo= JSON.stringify(arreglo);
                  unidad =JSON.stringify(tab);
                  Deshabilitar(tab);
                  console.log(arreglo+" - ");
                  $.ajax({
            type:'post',
             cache:false,
             url: "php/crear_subtema.php",
            data: {arreglo:arreglo, unidad:unidad, idtabla:idtabla },
            success:function(url){
            $('#'+tab+' div').html(url);
               }
             });
	          //$('#peticion').load('php/crear_unidad.php');
	    }else{
		   swal('No se guardaran los cambios');
	    }
	}
        );
  }
 
    /*tabs.find( ".ui-tabs-nav" ).sortable({
      axis: "x",
      stop: function() {
        getTab().tabs( "refresh" );
      }
    });*/
    
 
    // Actual addTab function: adds new tab using the input from the form above
    function addTab(titulo) {
      var label=  titulo,
        id = "subtema-" + tabCounter,
        li = $( tabTemplate.replace( /li>/g, "li id='li"+tabCounter+"'>").replace(/ef}'>#/g,"ef}' name='"+label+"' >#").replace(/#\{href\}/g, "#" + id).replace( /#\{label\}/g, label ));
      tabs.find( ".ui-tabs-nav" ).append( li );
      
      tabs.append( "<div id='" + id + "'></div>" );
      tabs.append($('#'+id).load('php/registrar_subtema.php'));
      tabs.tabs( "refresh" );
      if (!lista.has(tab)) {
        lista.set(tab,new Set());
        lista.get(tab).add(id);
      }else if (lista.has(tab)) {
        lista.get(tab).add(id);
      }
      Habilitar(tab);
      swal({   title: "Auto close alert!",   text: "LISTO",   timer: 100,   showConfirmButton: false });
      tabs.on( "click", "#li"+tabCounter+" img.ui-icon", function() {
        var panelId = $( this ).closest( "li" ).attr( "aria-controls" );
        console.log(panelId);
        $( "#" + panelId ).remove();
        lista.get(tab).delete(panelId);
        $(this).closest('li').remove();
        if (lista.get(tab).size==0) {
            Deshabilitar(tab);
        }
        tabs.tabs( "refresh" );
      });
      tabCounter++;
    }
    
    function dialog1(){
      
       swal({   title: "Agregar Subtema",   
          text: "Nombre maximo 15 caracteres",   
          type: "input",   
          showCancelButton: true,   
          closeOnConfirm: false,   
          animation: "slide-from-top",   
          inputPlaceholder: "Ej. Subtema 1" }, 
          function(inputValue){
            if (inputValue === false) {
              return false;
            }if (inputValue === "") {
                swal.showInputError("El nombre del subtema es necesario");
                return false;
            }else if (inputValue.length > 16) {
                swal.showInputError("El nombre es demaciado largo");
                return false;
            }
           addTab(inputValue);
           return false;
            });
    }

 
    // AddTab button: just opens the dialog
    $( "#add_tab" )
      .button()
      
      .on( "click", dialog1);
 
    // Close icon: removing the tab on click
    
    
    
    
    tabs.on( "keyup", function( event ) {
      if ( event.altKey && event.keyCode === $.ui.keyCode.BACKSPACE ) {
        var panelId = tabs.find( ".ui-tabs-active" ).remove().attr( "aria-controls" );
        $( "#" + panelId ).remove();
        tabs.tabs( "refresh" );
      }
    });
    
    //boton guardar y siguiente
  } );
  
  function Habilitar(subtema) {
       document.getElementById(subtema).getElementsByClassName("btn_form")[0].disabled=false;
       document.getElementById(subtema).getElementsByClassName("btn_form")[0].disabled=false;
  }
   function Deshabilitar(subtema) {
       document.getElementById(subtema).getElementsByClassName("btn_form")[0].disabled=true;
       document.getElementById(subtema).getElementsByClassName("btn_form")[0].disabled=true;
  }
  function complete() {
       var bandera=true;
       var unidades=document.getElementsByClassName('unidad').length;
       for (var i=0;i < unidades;i++) {
             if (document.getElementById('tabSub'+i).rows.length <= 2) {
                  swal("A algunas unidades le faltan subtemas REVISALO");
                  bandera = false;
                  break;
             }
       }
        return bandera;
  }
  
  </script>
  
</head>
<body>
<table style="float:left">
<tr>
<td><font FACE="courier new"><strong>NRC:&nbsp;</strong></font></td>
<td><font FACE="courier new"><?php echo $_SESSION['nrc']?>&nbsp; &nbsp; &nbsp; &nbsp;</font></td>
<td><font FACE="courier new"><strong>CLAVE:&nbsp;</strong></font></td>
<td><font FACE="courier new"><?php echo $_SESSION['clave']?>&nbsp; &nbsp; &nbsp; &nbsp;</font></td>
<td><font FACE="courier new"><strong>NOMBRE DE LA MATERIA:&nbsp;</strong></font></td>
<td><font FACE="courier new"><?php echo $_SESSION['nombreMateria']?></font></td>
</tr>

</table>
<?php echo '<a onclick="return complete();" target="_blank" href="php/prueba.php?Clave='.$_SESSION['clave'].'" ><img src="imagenes/printer.png" width="40px" height="40px" style="float:right; margin-right:30px; " /></a>'; ?>
<button style="clear:left; float:left" id="add_tab">Agregar Subtema</button>

<div class="tab" id="tabs">
  <ul>
      <?php
         $unidades=array();
            while($fila=$ejecutar->fetch_assoc()){
                 echo '<li class="unidad"><a href="#'.$fila['idUnidad'].'">'.$fila['NombreUni'].'</a></li>';
                 array_push($unidades,$fila['idUnidad']);
            }
      ?>
  </ul>
  <?php
         for($i=0;$i<count($unidades);$i++){
                 echo '<div class="subtema tab" id="'.$unidades[$i].'"><ul></ul><input disabled class="btn_form btn_guardar" type="submit" name="Guardar" id="Guardar'.$i.'" value="Guardar"><div class="tabla">';
                       $consulta= "select subtemas.nombre as nomsub,Fecha_pre,Fecha_real,Actividad,Recurso from unidad,materias,nrc,subtemas where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias and idMaterias=idMateria and idMaterias='".$_SESSION['clave']."' and unidad='".$unidades[$i]."' and  unidad=idUnidad";
                       $ejecutar=$blabla->query($consulta);
                        echo '<table id="tabSub'.$i.'">
                                 <thead>
                                 <tr>
                                       <th width="85px" rowspan="2">Subtema</th>
                                       <th colspan="2">Fecha</th>
                                       <th width="100px" rowspan="2">Actividad</th>
                                       <th width="100px" rowspan="2">Recursos</th>
                                 </tr>
                                 <tr>
                                       <th width="85px" >Programada</th>
                                       <th width="85px" >Real</th>
                                 </tr></thead><tbody>';
                            
                        while($fila=$ejecutar->fetch_assoc()){
                            echo '<tr>
                                       <td width="85px">'.$fila['nomsub'].'</td>
                                       <td width="85px">'.$fila['Fecha_pre'].'</td>
                                       <td width="85px">'.$fila['Fecha_real'].'</td>
                                       <td width="100px">'.$fila['Actividad'].'</td>
                                       <td width="100px">'.$fila['Recurso'].'</td>
                                  </tr>';
                        }
                        echo '</tbody></table>';
                 echo '</div></div>';
         }
        
  ?>
  
</div>


    
</body>
</html>