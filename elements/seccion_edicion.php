	<div class="tables">
		<div class="col-xs-9">
		<div class="edit_materias modal_ acciones" status="active" table="materias">
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

						 <div class="row row_table <?=($cont%2)==0?'dark':'clear';?>" clave="<?=$key; ?>">
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
						      <button class="b_basura"><i class="fa fa-trash" aria-hidden="true"></i></button>
						      <button class="b_editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						      <button class="b_ver"><i class="fa fa-eye" aria-hidden="true"></i></button>	
						    </div>
						 </div>
					<?php  $cont=$cont+1;
					       endforeach; ?>
					</div>        
				</div>
			</div>
		</div>
		<div class="edit_unidades modal_ acciones" status="inactive" modal-is="empty" table="unidades">
			<div class="row">
				<div class="col-xs-12 table_">
					<div class="row table_title">
                        <div class="col-xs-4 nopadding">
                            <p>Nombre</p>
                        </div>
                        <div class="col-xs-3 nopadding">
                            <p>Fecha Real</p>
                        </div>
                        <div class="col-xs-3 nopadding">
                            <p>Fecha Programada</p>
                        </div>
                        <div class="col-xs-2 nopadding">
                        	
                        </div>
                    </div>
                    <div class="content">
                    	<?php $cont=1;
                    	      foreach ($_SESSION['profesor']->avances as $key => $value) :	
                    	      	   foreach($value['Unidades'] as $key2 => $value2) : ?>
                    	      	        <div class="row row_table <?=($cont%2)==0?'dark':'clear';?>" father="<?=$key;?>" clave="<?=$key2;?>">
                                             <div class="col-xs-4 nopadding">
                                       	         <p><?=$value2['NombreUnidad'];?></p>
                                             </div>
                                             <div class="col-xs-3 nopadding">
                                       	         <p><?=$value2['UEvaluacionP'];?></p>
                                             </div>
                                             <div class="col-xs-3 nopadding">
                                       	         <p><?=$value2['UEvaluacionR'];?></p>
                                             </div>
                                             <div class="col-xs-2 nopadding">
                                       	        <button class="b_basura"><i class="fa fa-trash" aria-hidden="true"></i></button>
						                        <button class="b_editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						                        <button class="b_ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                             </div>
                                        </div>     
                    	<?php       $cont=$cont+1;
                                    endforeach;
                    	      endforeach; ?>     
                    </div>
				</div>
			</div>
		</div>
		<div class="edit_subtemas modal_ acciones" status="inactive" modal-is="empty" table="subtemas">
			<div class="row">
				<div class="col-xs-12 table_">
					<div class="row table_title">
                        <div class="col-xs-2 nopadding">
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
                        <div class="col-xs-2 nopadding">
                        	
                        </div>
                    </div>
                    <div class="content">
						 <?php $cont=1;
						       foreach ($_SESSION['profesor']->avances as $key => $value) : 
						       	    foreach($value['Unidades'] as $key2 => $value2) : 
						       	    	foreach($value2['Subtemas'] as $key3 => $value3) :?>
						       	    	    <div class="row row_table <?=($cont%2)==0?'dark':'clear';?>" father="<?=$key2;?>">
						       	    	    	<div class="col-xs-2 nopadding">
                                                    <p><?=$value3['NombreSubtema'];?></p>
                                                </div>
                                                <div class="col-xs-2 nopadding">
                                                    <p><?=$value3['SEvaluacionP'];?></p>
                                                </div>
                                                <div class="col-xs-2 nopadding">
                                                    <p><?=$value3['SEvaluacionR'];?></p>
                                                </div>
                                                <div class="col-xs-2 nopadding">
                                                    <p><?=$value3['Actividad'];?></p>
                                                </div>
                                                <div class="col-xs-2 nopadding">
                                                    <p><?=$value3['Recurso'];?></p>
                                                </div>
                                                <div class="col-xs-2 nopadding">
                        	                        <button class="b_basura"><i class="fa fa-trash" aria-hidden="true"></i></button>
						                            <button class="b_editar"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						                            <button class="b_ver"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                </div>
						       	    	    </div>	
						 <?php          $cont=$cont+1;
						                endforeach;
                                    endforeach;
						        endforeach; ?>       
				    </div>
				</div>
				
			</div>
		</div>
	    </div>
	    <div class="col-sm-3 menu_tables">
	    	<div class="row">
	    		<div class="col-xs-12">
	    			<button class="btn_form btn_agregar" status="active" type="materias">Materias</button>
	    		</div>
	    	</div>
            <div class="row">
	    		<div class="col-xs-12">
	    			<button class="btn_form btn_agregar" status="inactive" type="unidades">Unidades</button>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-xs-12">
	    			<button class="btn_form btn_agregar" status="inactive" type="subtemas">Subtemas</button>
	    		</div>
	    	</div>
	    </div>
	</div>
	<!--
