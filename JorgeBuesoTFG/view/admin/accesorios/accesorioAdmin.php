<div id="ContenidoFicha" class="w3-row-padding">
    <article>
        <h1><?php
            echo $datos->nombre ?></h1>
        <div class="w3-row-padding AccesorioAdminContenidoCarta">
            <div class="AccesorioimagenParticular">
                <img class="imagenUnica" src="<?php echo $_SESSION['public'] . "img/" . $datos->imagen ?>"
                     alt="nombre:<?php echo $datos->nombre ?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p>precio:<?php echo $datos->precio ?>€</p>
                    <p><?php echo $datos->caracteristicas ?></p>
                    <br>

                </div>
            </div>
            <?php if (isset($_SESSION['usuario'])) {
                if ($_SESSION['accesorios']) {
                    ?>
                    <a href="<?php echo $_SESSION['home'] . "admin/accesorios/editar/" . $datos->id ?>" title="Editar"
                       type="button" class="btn btn-outline-light">
                        Editar
                    </a>
                    <a href="<?php echo $_SESSION['home'] . "admin/accesorios/borrar/" . $datos->id ?>" title="Borrar"
                       type="button" class="btn btn-outline-light">
                        Borrar
                    </a>
                <?php }
            } ?>

            <a href="<?php echo $_SESSION['home'] . "cesta" ?>" title="VerlaCesta"
               type="button" class="btn btn-outline-dark">ver la cesta</a>

            <a href="<?php echo $_SESSION['home'] . "AnadirCesta" . $row->slug ?>" class="btn btn-info"
               title="AñadirCesta">Añadir a la cesta</a>

        </div>

    </article>

</div>