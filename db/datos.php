<?php

     class Usuario{

            public $id="";
            public $nombre="";
            public $apellidop="";
            public $apellidom="";
            public $status="";
            public $sexo="";
            public $avances=array();


            public function __construct($id,$nombre,$apellidop,$apellidom,$sexo){
                 $this->id=$id;
                 $this->nombre=$nombre;
                 $this->apellidop=$apellidop;
                 $this->apellidom=$apellidom;
                 $this->sexo=$sexo;
            }

            //arreglo avances
            function addAvances($consulta){

                  $ejecutar_consulta=conectar()->query($consulta);
                  
                  while($fila=mysqli_fetch_array($ejecutar_consulta)){
                       //Verificamos si existe la materia en el arreglo
                       if (!(isset($this->avances[$fila['Clave']]))) {
                           $this->addNewMateria($fila);
                       }
                       //Verificamos si existe la unidad en el arreglo
                       elseif (!isset($this->avances[$fila['Clave']]['Unidades'][$fila['id_unidad']])) {
                           $this->addNewUnidad($fila);
                       }
                       //Verificamos si existe el subtema en el arreglo
                       elseif (!(isset($this->avances[$fila['Clave']]['Unidades'][$fila['id_unidad']]['Subtemas'][$fila['id_subtema']]))) {
                           $this->addNewSubtema($fila);
                       }
                  }
            }

            public function addNewMateria($fila){
              // Materia
                $this->avances[$fila['Clave']] = array(
                                  'nrc' => $fila['nrc'],
                                  'nombre' => $fila['Nombre'],
                                  'creditos' => $fila['Creditos'],
                                  'edificio' => $fila['Edificio'],
                                  'departamento' => array(
                                                       'id' => $fila['id_departamento'],
                                                       'nombre' => $fila['nombre_departamento']
                                                    ),
                                  'carrera' => array(
                                                  'id' => $fila['id_carrera'],
                                                  'nombre' => $fila['nombre_carreras'],
                                                  'siglas' => $fila['siglas'] 
                                               ),
                                  'unidades' => array());

                $this->addNewUnidad($fila);
            }

            public function addNewUnidad($fila){
              // Unidad
              if (isset($fila['id_unidad'])){
              $this->avances[$fila['Clave']]['unidades'][$fila['id_unidad']]= array(
                                'nombre' => $fila['nombre_unidad'],
                                'fecha_pro' => $fila['Evaluacion_programada'],
                                'fecha_real' => $fila['Evaluacion_real'],
                                'Subtemas' => array());

                $this->addNewSubtema($fila);
              }
            }

            public function addNewSubtema($fila){
              //Subtema
              if (isset($fila['IdSubtema'])) {
                $this->avances[$fila['Clave']]['unidades'][$fila['id_unidad']]['Subtemas'][$fila['id_subtema']] = array(
                                  'nombre' => $fila['nombre_subtema'],
                                  'fecha_pro' => $fila['fecha_programada'],
                                  'fecha_real' => $fila['fecha_real'],
                                  'actividad' => $fila['Actividad'],
                                  'recurso' => $fila['Recurso']);
              }
            }
     }

?>
