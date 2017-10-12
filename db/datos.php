
<?php

     class Usuario{

            public $idprofesor="";
            public $nombre="";
            public $apellidop="";
            public $apellidom="";
            public $status="";
            public $sexo="";
            public $avances=array();


            public function __construct($idprofesor,$nombre,$apellidop,$apellidom,$status,$sexo){
                 $this->idprofesor=$idprofesor;
                 $this->nombre=$nombre;
                 $this->apellidop=$apellidop;
                 $this->apellidom=$apellidom;
                 $this->status=$status;
                 $this->sexo=$sexo;
            }

            //arreglo avances
            function addAvances($consulta){

                  $ejecutar_consulta=conectar()->query($consulta);

                  while($fila=mysqli_fetch_array($ejecutar_consulta)){
                       //Verificamos si existe la materia en el arreglo
                       if (!(isset($this->avances[$fila['IdMateria']]))) {
                           $this->addNewMateria($fila);
                       }
                       //Verificamos si existe la unidad en el arreglo
                       elseif (!isset($this->avances[$fila['IdMateria']]['Unidades'][$fila['IdUnidad']])) {
                           $this->addNewUnidad($fila);
                       }
                       //Verificamos si existe el subtema en el arreglo
                       elseif (!(isset($this->avances[$fila['IdMateria']]['Unidades'][$fila['IdUnidad']]['Subtemas'][$fila['IdSubtema']]))) {
                           $this->addNewSubtema($fila);
                       }
                  }
            }

            public function addNewMateria($fila){
              // Materia
                $this->avances[$fila['IdMateria']] = array(
                                  'Nrc' => $fila['nrc'],
                                  'NombreMateria' => $fila['NombreMateria'],
                                  'Creditos' => $fila['Creditos'],
                                  'Edificio' => $fila['Edificio'],
                                  'Departamentos' => $fila['Departamentos_idDepartamentos'],
                                  'Carrera' => $fila['Carrera'],
                                  'Unidades' => array());
                $this->addNewUnidad($fila);
            }

            public function addNewUnidad($fila){
              // Unidad
              if (isset($fila['IdUnidad'])){
              $this->avances[$fila['IdMateria']]['Unidades'][$fila['IdUnidad']]= array(
                                'NombreUnidad' => $fila['NombreUnidad'],
                                'UEvaluacionP' => $fila['UEvaluacionP'],
                                'UEvaluacionR' => $fila['UEvaluacionR'],
                                'Subtemas' => array());

                $this->addNewSubtema($fila);
              }
            }

            private function addNewSubtema($fila){
              //Subtema
              if (isset($fila['IdSubtema'])) {
                $this->avances[$fila['IdMateria']]['Unidades'][$fila['IdUnidad']]['Subtemas'][$fila['IdSubtema']] = array(
                                  'NombreSubtema' => $fila['NombreSubtema'],
                                  'SEvaluacionP' => $fila['SEvaluacionP'],
                                  'SEvaluacionR' => $fila['SEvaluacionR'],
                                  'Actividad' => $fila['Actividad'],
                                  'Recurso' => $fila['Recurso']);
              }
            }
     }

?>
