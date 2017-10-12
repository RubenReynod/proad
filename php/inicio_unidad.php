<?php
include('conexion.php');
session_start();
$consulta="select idnrc,Materias_idMaterias,nombre from nrc,materias where Profesores_idProfesores='".$_SESSION['user']."' and idMaterias=Materias_idMaterias";
$ejecutar=$blabla->query($consulta);
?>
<html>
    <body>
        <form id="GoToUnidad" method="POST">
        <select class="campo_form" name="nrc" id="nrc">
            <option value="">NRC - Clave - Nombre...</option>
            <?php
            while($registro=$ejecutar->fetch_assoc()){
                echo '<option value="'.$registro["idnrc"]."/".$registro['Materias_idMaterias'].'/'.$registro['nombre'].'">'.$registro["idnrc"]." - ".$registro['Materias_idMaterias'].' - '.$registro['nombre'].'</option>';
            }
            ?>
        </select>
        <br>
        <input class="btn_form" id="inicio_unidad" type="submit" value="Aceptar">
        </form>
        
        <script>
    document.getElementById('inicio_unidad').addEventListener('click',function(evt) {    
        evt.preventDefault();
        var nrc=document.getElementById('nrc').value;
        if (nrc=="") {
            swal('Eligue un Avance Programatico');
        }else if (nrc!=""){
                $.ajax({
            type: 'POST',
            url: 'html/addtab.php',
            data: $('#GoToUnidad').serialize(),
            success: function(data) {
                $('#peticion').html(data);
            }
        });
        }
    });
        </script>
    </body>
</html>