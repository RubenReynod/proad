//carrousel home
$('#home').ready(function(){
		$('#carousel-home').slick({
			autoplay: true,
			prevArrow:'<div class="prev"><i class="fa fa-angle-double-left" aria-hidden="true"></i></div>',
			nextArrow:'<div class="next"><i class="fa fa-angle-double-right" aria-hidden="true"></i></div>',
      infinite: true,
			autoplaySpeed: 8000,
      speed: 2000,
      fade: true,
      cssEase: 'linear'

		});
	$('.btn_registrar').on('click',function(){
		$('.lightbox').addClass('active');
	});	
});

// lightbox
function show_lightbox(){
	  $('.lightbox').addClass('active');
}
function show_lightbox(cual,tipo,id=''){
	  if (tipo=="subtema") {
	  	  $('.'+cual).find('.title').text('Agregar Subtema');
				$('.'+cual).find('.campo').attr('placeholder','Subtema 1');
				$('.'+cual).find('.btn_add').attr('onclick','add_form("subtema","'+id+'");');
	  }
		else if (tipo=="unidad") {
	  	  $('.'+cual).find('.title').text('Agregar Unidad');
				$('.'+cual).find('.campo').attr('placeholder','Unidad 1');
				$('.'+cual).find('.btn_add').attr('onclick','add_form("unidad");');
	  }
	  $('.'+cual).addClass('active');
}
function close_lightbox(){
	  $('.lightbox').removeClass('active');
}
// logout
function inicio(){
	window.location = '/proad/';
}
function perfil(){
   window.location = '/proad/usuario';
}
function cerrar_session(vista){
   window.location = vista;
}
// menu header
function menu_header(){
	if($('.logout .submenu i').hasClass('fa-chevron-down')){
		$('.logout .submenu i').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		$('#header .menu-header').slideDown('slow');
	}else{
		$('.logout .submenu i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		$('#header .menu-header').slideUp('slow');
	}

}
//menu
function menu(){
	$('.menu').slideToggle('slow');
}
//submenu
function submenu(){

	if($('.menu .boton_menu .btn_submenu').hasClass('fa-chevron-down')){
		$('.menu .boton_menu .btn_submenu').removeClass('fa-chevron-down').addClass('fa-chevron-up');
		$('.menu .submenu').slideDown('fast');
	}else{
		$('.menu .boton_menu .btn_submenu').removeClass('fa-chevron-up').addClass('fa-chevron-down');
		$('.menu .submenu').slideUp('fast');
	}

}
//menu fixed
function show_seccion(cual){
	  $('.subir').css({'animation':'subir 3s ease'});
	  $('.secciones').removeClass('active');
	  $('#'+cual).addClass('active');
}
// login
$('#form-login').submit(function(evt){
      evt.preventDefault();
      var datos = $(this).serialize();
        $.ajax({
			 type: 'POST',
			 url: $(this).attr('action'),
			 data: datos,
			 dataType: 'json',
       success: function(resp){
				 if (resp.status) {
             window.location = "usuario";
				 }else{
					   alert("El usuario o la contraseña son incorrectos");
				 }
       }
		});

});
// registro
$('#form-registro').on('submit',function(evt){
	evt.preventDefault();
     var datos = $(this).serialize();
     if ($('contraseña',this).val()==$('contraseña2',this).val()) {
	    $.ajax({
		    type: 'POST',
		    url: $(this).attr('action'),
		    data: datos,
		    dataType: 'json',
		    success: function(resp){
                if (resp.status) {
         	        alert("Registro exitoso");
                }else{
                    alert("El registro ya existe");
		        }
		    }
	    });
	 }else{
	 	console.log("Las contraseñas no coinciden");
	 }
});
// registro Materias_idMaterias
$('.form_registro').on('submit',function(evt){
	evt.preventDefault();
	var that = this;
	var datos = $(this).serialize();
	$.ajax({
		  type: 'POST',
			url: $(this).attr('action'),
			data: datos,
			dataType: 'json',
			success: function (resp){
                if (resp.status) {
           	        alert('Si se pudo');
           	        $('#crear_unidades').load('../elements/form_unidad.php?'+$.param({clave:$('.clave',that).val()}));
				    show_seccion('crear_unidades');	    
                }else{
					alert('Algo fallo :(');
				}
			}
	});
	return false;
});

// vista formulario Unidad
function add_content (btn){
	if ($("#select_avance").val()!="") {
			$('#crear_'+btn).load((btn=='unidades'?'../elements/form_unidad.php?':'../elements/form_subtema.php?')+$.param({clave:$("#select_avance").val()}));
	}
}

function mostrar_select (btn){
	if (btn=='unidades') {
		  $('#crear_unidades').load('../elements/select_avance.php?'+$.param({btn:btn}));
	}else{
		  $('#crear_subtemas').load('../elements/select_avance.php?'+$.param({btn:btn}));
	}

}

var lista = new Map(),
    cont_ = 1;
function add_form(tipo,id = ''){
	 var nombre = $('.lightbox .campo').val(),
	     tab = '<li class="tab tab-'+cont_+'"><b onclick="show_form_unidad('+cont_+');">'+nombre+'</b><i class="fa fa-times" aria-hidden="true" onclick="remove_unidad('+cont_+');"></i></li>';
			 formulario = '';
	 if (tipo=='unidad') {
				 formulario = '<form class="form_unidad" form="form-'+cont_+'" action="../db/guardar_unidad.php" method="post" tab="'+cont_+'" style="display:none;">'+
                           '<input class="nombre" name="datos[nombre]" type="text" name="" value="" placeholder="Nombre" required>'+
                           '<input class="Fecha_real" name="datos[fecha_real]" type="date" name="" value="" required>'+
                           '<input class="Fecha_programada" name="datos[fecha_programada]" type="date" name="" value="" required>'+
                      '</form>';
		}else if (tipo=='subtema') {
			formulario = '<form class="form_subtema" form="form-'+cont_+'" action="../db/guardar_subtema.php" method="post" style="display:none;">'+
			                  '<input class="clave" type="number" name="datos[id_unidad]" value="'+id+'" style="display:none;" required>'+
												'<input type="text" name="datos[nombre]" value="" placeholder="Nombre" required>'+
												'<input type="date" name="datos[fecha_real]" value="" required>'+
												'<input type="date" name="datos[fecha_programada]" value="" required>'+
												'<input type="text" name="datos[actividad]" value="" placeholder="Actividad" required>'+
												'<input type="text" name="datos[recurso]" value="" placeholder="Recurso" required>'+
									 '</form>';
		}
		lista.set(cont_+"",$('#tab_'+tipo+id).parents('.forms__').attr('id'));
		cont_ = cont_+1;
		close_lightbox();
		$('.lightbox .campo').val('');
		$('#tab_'+tipo+id).append(tab);
		$('#tab_'+tipo+id).parents('.forms__').find('.formularios').append(formulario);
}
function add_row_unidad(datos){
	  var cont = $('#crear_unidades .table_ .row_table').length;
	  var row ='<div class="row row_table '+((cont%2)==0?'clear':'dark')+'" style="display:none;">';
          datos.forEach(function(value,key){
          	    if (value.name != 'datos[id]') {
                    row = row+'<div class="col-xs-4 nopadding '+value.value+'">'+
                                  '<p>'+value.value+'</p>'+
                              '</div>';    
                }
          });
		   row = row+'</div>';
		$('#crear_unidades .table_').append(row).queue(function(){
			$('.row_table:last-child',this).slideDown('slow');
			$(this).dequeue();
		});
}

function add_row_subtema(datos){
    var cont = $('#crear_subtemas .table_ .row_table').length;
    var row ='<div class="row row_table '+((cont%2)==0?'clear':'dark')+'" style="display:none;">';
          datos.forEach(function(value,key){
                if (value.name != 'datos[id_unidad]') {
                    if (value.name != 'datos[nombre]' | value.name != 'datos[fecha_real]' | value.name != 'datos[fecha_programada]') {
                        row = row+'<div class="col-xs-2 nopadding '+value.value+'">'+
                                  '<p>'+value.value+'</p>'+
                              '</div>';  
                    }else{
                        row = row+'<div class="col-xs-3 nopadding '+value.value+'">'+
                                '<p>'+value.value+'</p>'+
                            '</div>';  
                    }  
                }
          });
       row = row+'</div>';
    $('#crear_subtemas .forms__[status="active"] .table_').append(row).queue(function(){
      $('.row_table:last-child',this).slideDown('slow');
      $(this).dequeue();
    });
}
function add_row_subtema(table,nombre,Fp,Fr,actividad,recurso){
	  var cont = $('#form-'+table+' .table_ .row_table').length;
	  var row ='<div class="row row_table '+((cont%2)==0?'clear':'dark')+'">'+
				         '<div class="nombre col-xs-2 nopadding">'+
							       '<p>'+nombre+'</p>'+
				         '</div>'+
				         '<div class="fecha_pro col-xs-2 nopadding">'+
							       '<p>'+Fp+'</p>'+
				         '</div>'+
				         '<div class="fecha_real col-xs-2 nopadding">'+
							       '<p>'+Fr+'</p>'+
				         '</div>'+
				         '<div class="actividad col-xs-3 nopadding">'+
							       '<p>'+actividad+'</p>'+
				         '</div>'+
				         '<div class="recurso col-xs-3 nopadding">'+
							       '<p>'+recurso+'</p>'+
				         '</div>'+
		         '</div>';
		$('#form-'+table+' .table_').append(row);
}
function show_form_unidad(cual){
  console.log($('form[form="form-'+cual+'"]'));
	$('form[form^="form-"]').slideUp('slow');
	$('form[form="form-'+cual+'"]').slideDown('slow');
	$('.tab').removeClass('active');
	$('.tab-'+cual).addClass('active');
}

function remove_unidad(cual){
	  $('.tab-'+cual).remove();
	  $('form[form="form-'+cual+'"]').remove();
	  lista.delete(cual);
}
 
$('.secciones').on('submit','.form_unidad',function(evt){
        evt.preventDefault();
        var that = this;
        var datos = $(this).serializeArray();
            datos.push({'name':'datos[id]','value':$('.info_materia .clave').attr('id')});

        $.ajax({
        	type: 'post',
        	data: datos,
        	url: $(this).attr('action'),
        	dataType: 'json',
        	success: function(resp){
                if (resp.status) {
                	alert("Se guardo exitosamente");
                	remove_unidad($(that).attr('tab'));
                	add_row_unidad(datos);
                }else{
                	alert("Fallo al guardar");
                }
        	}
        });    
 });

$('.secciones').on('submit','.form_subtema',function(evt){
        evt.preventDefault();
        var that = this;
        var datos = $(this).serializeArray();
        $.ajax({
        	type: 'post',
        	data: datos,
        	url: $(this).attr('action'),
        	dataType: 'json',
        	success: function(resp){
                if (resp.status) {
                  console.log(resp);
                	alert("Se guardo exitosamente");
                  console.log($('.clave',that).val());
                	remove_unidad($('.clave',that).val());
                	//add_row_subtema(datos);
                }else{
                	alert("Fallo al guardar");
                }
        	}
        });    
 });

 function guardar_unidad(){
 	$('.form_unidad ').each(function(){
 		var bandera = true;
 		$(this).serializeArray().forEach(function(valor, llave){
             if (valor.value == '') {
             	bandera = false;
             	return false;
             }
 		});
 		if (bandera) {
 			$(this).submit();
 		}
 		
 	});
 }

 function guardar_subtema(unidad){
     //var unidad = $(btn).parents('.forms__').attr('id');
     $('#form-'+unidad+' .form_').each(function(){
     	 var bandera = true;

     	 $(this).serializeArray().forEach(function(valor,llave){
     	 	if (valor.value == '') {
     	 		bandera = false;
     	 		return false;
     	 	}
     	 });
         if (bandera) {
         	$(this).submit();
         }
     });
    /* lista.forEach(function(valor,llave){
         if(valor==unidad){
              var nombre=$(".form_u-"+llave).find(".nombre").val(),
                  fecha_real=$(".form_u-"+llave).find(".Fecha_real").val(),
                  fecha_programada=$(".form_u-"+llave).find(".Fecha_programada").val(),
                  actividad=$(".form_u-"+llave).find(".actividad").val(),
                  recurso=$(".form_u-"+llave).find(".recurso").val(),
                  id_materia=$('.info_materia .clave').attr('id'),
                  idunidad = ($(btn).parents('.forms__').attr('id')).substr(($(btn).parents('.forms__').attr('id')).indexOf('-')+1);
              if (nombre=="" | fecha_real=="" | fecha_programada =="" | actividad =="" | recurso =="") {
                   alert("Datos incompletos");
              }else{
                   $(".form_u-"+llave).submit(function(evento){
                       evento.preventDefault();
                       $.ajax({
                       	   type:'post',
                       	   data:{id_materia:id_materia,nombre:nombre,fecha_real:fecha_real,fecha_programada:fecha_programada,actividad:actividad,recurso:recurso,unidad:idunidad},
                       	   url: $(this).attr('action'),
                       	   success: function(respuesta){
                       	   	console.log(respuesta);
                               if (respuesta==1) {
                               	   alert("Se guardo correstamente");
                               	   remove_unidad(llave);
                               	   add_row_subtema(idunidad,nombre,fecha_programada,fecha_real,actividad,recurso);
                               }else{
                               	   alert("error");
                               }
                       	   }
                       });
                   });
                   $(".form_u-"+llave).submit();
              }
         }
     });*/
 }

 // tablas Subtemas
function show_forms(btn){
	  var id = $(btn).attr('id');
		    id = id.substr(2);
	  if ($(btn).attr('status')=='inactive') {
			  $('.tabs__').attr('status','inactive');
	  	  $(btn).attr('status','active');
				$('.forms__').attr('status','inactive');
				$('#form-'+id).attr('status','active');
	  }
}

// botones mostrar llas tablas en edicion
$('.btn_agregar').click(function(){
	$('.btn_agregar').attr('status','inactive');
	$(this).attr('status','active');
	$('.acciones').attr('status','inactive');
	$('.edit_'+$(this).attr('type')).attr('status','active');
});

//boton eliminar materia
$('.b_basura').click(function(){
 var fila=$(this).parents('.row_table').attr("clave");
 $.ajax({
 	type: 'post',
 	url:"../db/eliminar.php",
 	data: {tabla:'materias',id:fila},
 	dataType:"json",
 	success:function(recibe){
       if (recibe.respuesta) {
       	   alert('Se elimino correctamentee');
       	   $('.row_table[clave="'+fila+'"]').slideUp();
       	   $('.row_table[clave="'+fila+'"]').queue(function(){
       	   	   $(this).remove();
       	   	   $('.edit_materias .row_table ').each(function(index){
       	   	        var color = ((index+1)%2) == 0?'dark':'clear';
                    if (!$(this).hasClass(color)) {
                        $(this).removeClass('dark clear').addClass(color);
                    }
       	       });
       	   	   $(this).dequeue();
       	   });

       }else{
           alert('No se pudo eliminar');
       } 
 	}

 });
});

// boton mostrar unidad o subtema
$('.b_ver').click(function(){
	var clave = $(this).parents('.row_table ').attr('clave');
    var tabla = $(this).parents('[table]').attr('table');
    if (tabla=='materias') {
    	$('.edit_unidades .content .row_table[father]').hide();
    	if ($('.edit_unidades .content .row_table[father="'+clave+'"]').length > 0) {
    		$('.edit_unidades .content .row_table[father="'+clave+'"]').show().queue(function(){
    		    $('.acciones').attr('status','inactive');
    		    $('.acciones.edit_unidades').attr('status','active');
    		    $(this).dequeue();
    	    });
    	}
    }else if (tabla=='unidades') {
    	$('.edit_subtemas .content .row_table[father]').hide();
    	if ($('.edit_subtemas .content .row_table[father="'+clave+'"]').length > 0) {
    		$('.edit_subtemas .content .row_table[father="'+clave+'"]').show().queue(function(){
    		    $('.acciones').attr('status','inactive');
    		    $('.acciones.edit_subtemas').attr('status','active');
    		    $(this).dequeue();
    	    });
    	}
    }
});

// boton editar 
$('.b_editar').click(function(){
	
	 $('.Nombre').html("<input class='edicionM' type='text' value='"+$('.Nombre').text()+"'/>");
	 $('.Creditos').html("<input class='edicionM' type='number' value='"+$('.Creditos').text()+"'/>");
	 $('.Edificio').html("<select class='edicionM'  value='"+$('.Edificio').text()+"'/>");
	 $('.Departamento').html("<input class='edicionM' value='"+$('.Departamento').text()+"'/>");
	 $('.Carrera').html("<input class='edicionM' value='"+$('.Carrera').text()+"'/>");
	 
});
