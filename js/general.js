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
});

// lightbox
function show_lightbox(){
	  $('.lightbox').addClass('active');
}
function show_lightbox(cual,tipo){
	  if (tipo=="subtema") {
	  	  $('.'+cual).find('.title').text('Agregar Subtema');
				$('.'+cual).find('.campo').attr('placeholder','Subtema 1');
				$('.'+cual).find('.btn_add').attr('onclick','add_form("subtema");');
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
	window.location = '/proadavance/';
}
function perfil(){
   window.location = '/proadavance/usuario';
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
$('#form-login').submit(function(){
    var user=$(this).find('.user').val();
		var password=$(this).find('.password').val();
	  $.ajax({
			 type: 'POST',
			 url: $(this).attr('action'),
			 data: {user:user,password:password},
       success: function(resp){
				 if (resp==true) {
             window.location = "usuario";
				 }else{
					   alert("El usuario o la contraseña son incorrectos");
				 }
       }
		});
		return false;
});
// registro
$('#form-registro').submit(function(){
	 var nombre = $(this).find('.nombre').val();
	 var apellidoP = $(this).find('.apellidoP').val();
	 var apellidoM = $(this).find('.apellidoM').val();
	 var codigo = $(this).find('.codigo').val();
	 var contraseña = $(this).find('.contraseña').val();
	 var contraseña2 = $(this).find('.contraseña2').val();
	 var sexo = $(this).find('.sexo').val();
	 $.ajax({
		 type: 'POST',
		 url: $(this).attr('action'),
		 data: {nombre:nombre,apellidoP:apellidoP,apellidoM:apellidoM,codigo:codigo,contraseña:contraseña,contraseña2:contraseña2,sexo:sexo},
		 success: function(resp){
         if (resp==2) {
         	   alert("Las contraseñas no coinciden");
         }else if (resp==1) {
             window.location = "usuario";
         }else{
					   alert("El usuario ya existe");
				 }
		 }
	 });
	 return false;
});
// registro Materias_idMaterias
$('#form_materia').submit(function(){
	var clave = $(this).find('.clave').val();
	var nrc = $(this).find('.nrc').val();
	var nombre = $(this).find('.nombre').val();
	var creditos = $(this).find('.creditos').val();
	var edificio = $(this).find('.edificio').val();
	var carrera = $(this).find('.carrera').val();
	var departamento = $(this).find('.departamento').val();
	$.ajax({
		  type: 'POST',
			url: $(this).attr('action'),
			data:{clave:clave,nrc:nrc,nombre:nombre,creditos:creditos,edificio:edificio,carrera:carrera,departamento:departamento},
			success: function (resp){
           if (resp == 1) {
           	    alert('Si se pudo');
								$('#crear_unidades').load('../elements/form_unidad.php?'+$.param({clave:clave}));
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
    cont_unidad = 1;
function add_form(tipo){
	 /*var nombre = $('.lightbox .campo').val(),
	     tab = '',
			 formulario = '';*/
	 if (tipo=='unidad') {
     var nombre = $('.lightbox .campo').val(),
		     tab = '<li class="tab tab-'+cont_unidad+'"><b onclick="show_form_unidad('+cont_unidad+');">'+nombre+'</b><i class="fa fa-times" aria-hidden="true" onclick="remove_unidad('+cont_unidad+');"></i></li>';
				 formulario = '<form class="form_unidad form_u-'+cont_unidad+'" action="../db/guardar_unidad.php" method="post">'+
                           '<input class="nombre" type="text" name="" value="" placeholder="Nombre" required>'+
                           '<input class="Fecha_real" type="date" name="" value="" required>'+
                           '<input class="Fecha_programada" type="date" name="" value="" required>'+
                      '</form>';
				 lista.set(cont_unidad+"",nombre);
				 cont_unidad = cont_unidad+1;
		     close_lightbox();
		     $('.lightbox .unidad input[type="text"]').val('');
		     $('#tab_unidad').append(tab);
		     $('#formularios').append(formulario);
		}

}
function add_row_unidad(nombre,Fp,Fr){
	  var cont = $('#crear_unidades .table_ .row_table').length;
	  var row ='<div class="row row_table '+((cont%2)==0?'clear':'clear')+'">'+
				         '<div class="nombre col-xs-4 nopadding">'+
							       '<p>'+nombre+'</p>'+
				         '</div>'+
				         '<div class="fecha_pro col-xs-4 nopadding">'+
							       '<p>'+Fp+'</p>'+
				         '</div>'+
				         '<div class="fecha_real col-xs-4 nopadding">'+
							       '<p>'+Fr+'</p>'+
				         '</div>'+
		         '</div>';
		$('#crear_unidades .table_').append(row);
}
function show_form_unidad(cual){
	  $('.form_unidad').slideUp('slow');
		$('.form_u-'+cual).slideDown('slow');
		$('.tab').removeClass('active');
		$('.tab-'+cual).addClass('active');
}

function remove_unidad(cual){
	  $('.tab-'+cual).remove();
		$('.form_u-'+cual).remove();
		lista.delete(cual);
}



 function guardar_unidad(){
 	lista.forEach(function(valor, llave){
		var nombre=$(".form_u-"+llave).find(".nombre").val(),
		Fecha_real=$(".form_u-"+llave).find(".Fecha_real").val(),
		Fecha_programada=$(".form_u-"+llave).find(".Fecha_programada").val(),
		id_materia=$('.info_materia .clave').attr('id');;
		if (nombre=="" | Fecha_real=="" | Fecha_programada =="") {
         alert("Datos incompletos");
	  }else{
	    $(".form_u-"+llave).submit(function(evento){
			   evento.preventDefault();
			   $.ajax({
				      type:'post',
				      data:{clave:id_materia,nombre:nombre,Fecha_real:Fecha_real,Fecha_programada:Fecha_programada},
				      url:$(this).attr("action"),
				      success:function(respuesta){
					      if (respuesta==1) {
							      alert("LISTO GUARDADO");
										remove_unidad(llave);
                    add_row_unidad(nombre,Fecha_programada,Fecha_real);
					      }else {
							      alert("error");
					      }
				      }
			    });
		  });
      $(".form_u-"+llave).submit();
	 }
 	});
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
