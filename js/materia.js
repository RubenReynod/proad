var campo=document.getElementById('RegistroMateria').getElementsByClassName('campo'),
    boton='';

    document.getElementById('Guardar').addEventListener('click',verificar);
    document.getElementById('Siguiente').addEventListener('click',verificar);
 
    function verificar(){
	//evt.preventDefault();
	boton=this.value;
	var bandera=true;
	for (var i=0;i<campo.length;i++) {
	    
	    if (!campo[i].value.localeCompare('')) {
		swal("Faltan campos por llenar");
		bandera=false;
		break;
	    }
	}
	if (bandera) {
		$('#RegistroMateria').submit(function(evt){
	           evt.preventDefault();
		   confirmar();  
    });
        }
    }
    
    function confirmar() {
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
	    $.ajax({
            type: 'POST',
            url: $('#RegistroMateria').attr('action'),
            data: $('#RegistroMateria').serialize(),
            success: function(data) {
                $('#peticion').html(data);
            }
        });
	    }else{
		   swal('No se guardaran los cambios');
	    }
	}
        );
    }
    
    