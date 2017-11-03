<div id="menu_fixed">
    <nav class="menu">

        <li class="boton_menu"><i class="fa fa-sitemap btn" aria-hidden="true"><p onclick="show_seccion('instrucciones');">Instrucciones</p></i></li>
        <li class="boton_menu" onclick="submenu();"><i class="fa fa-file-text-o btn" aria-hidden="true"><p>Crear<i class="fa fa-chevron-down btn_submenu" aria-hidden="true"></i></p></i>
            <nav class="submenu">
                <li onclick="show_seccion('crear_materia');">Avance</li>
                <li onclick="show_seccion('crear_unidades'); mostrar_select('unidades');">Unidades</li>
                <li onclick="show_seccion('crear_subtemas'); mostrar_select('subtemas');">Subtemas</li>
            </nav>
        </li>
        <li class="boton_menu" onclick="show_seccion('edicion');"><i class="fa fa-pencil-square-o btn" aria-hidden="true"><p>Edición</p></i></li>
        <li class="boton_menu" onclick="show_seccion('nosotros');"><i class="fa fa-user-secret btn" aria-hidden="true" ><p>Nosotros</p></i></li>

    </nav>
</div>
<!--
