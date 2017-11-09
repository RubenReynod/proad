	<div class="tables">
		<div class="col-xs-9">
		<div class="edit_materia modal_ acciones" status="active">
			<div class="row">
				<div class="col-xs-12 table_">
					<div class="row table_title">
                        <div class="col-xs-4">
                            <p>Nombre</p>
                        </div>
                        <div class="col-xs-1 nopadding">
                            <p>Creditos</p>
                        </div>
                        <div class="col-xs-1 nopadding">
                            <p>Edificio</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Departamento</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Carrera</p>
                        </div>
                        <div class="col-xs-2 nopadding"></div>
                    </div>
                    <div class="content"> 
					<?php $cont=1;
					      foreach ($_SESSION['profesor']->avances as $key => $value) : ?>
						 <div class="row row_table <?=($cont%2)==0?'dark':'clear';?>">
						    <div class="col-xs-4 nopadding">
						 	    <p><?=$value['NombreMateria'];?></p>
						    </div>
						    <div class="col-xs-1 nopadding">
						 	    <p><?=$value['Creditos'];?></p>
						    </div>
						    <div class="col-xs-1 nopadding">
						 	    <p><?=$value['Edificio'];?></p>
						    </div>
						    <div class="col-xs-2 nopadding">
						 	    <p><?=$value['Departamentos'];?></p>
						    </div>
						    <div class="col-xs-2 nopadding">
						 	    <p><?=$value['Carrera'];?></p>
						    </div>
						    <div class="col-xs-2 nopadding">	
						    </div>
						 </div>
					<?php  $cont=$cont+1;
					       endforeach; ?>
					</div>        
				</div>
			</div>
		</div>
		<div class="edit_unidad modal_ acciones" status="inactive" modal-is="empty">
			<div class="row">
				<div class="col-xs-12 table_">
					<div class="row table_title">
                        <div class="col-xs-6 nopadding">
                            <p>Nombre</p>
                        </div>
                        <div class="col-xs-3 nopadding">
                            <p>Fecha Real</p>
                        </div>
                        <div class="col-xs-3 nopadding">
                            <p>Fecha Programada</p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<div class="edit_subtema modal_ acciones" status="inactive" modal-is="empty">
			<div class="row">
				<div class="col-xs-9 table_">
					<div class="row table_title">
                        <div class="col-xs-4 nopadding">
                            <p>Nombre</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Fecha Real</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Fecha Programada</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Actividad</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                            <p>Recurso</p>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	    </div>
	    <div class="col-sm-3 menu_tables">
	    	<div class="row">
	    		<div class="col-xs-12 btn_materia" status="active">
	    			
	    		</div>
	    	</div>
            <div class="row">
	    		<div class="col-xs-12 btn_unidad" status="inactive">
	    			
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-xs-12 btn_subtema" status="inactive">
	    			
	    		</div>
	    	</div>
	    </div>
	</div>
<script type="text/javascript">
	window.onload = function(){
		do_picture('materia');
	}
</script>
	<!--
