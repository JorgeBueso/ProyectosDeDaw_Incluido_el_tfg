<div id="ContenidoFicha" class="w3-row-padding">

    <article>
        <?php
        $n=0;
        foreach ($datos as $row) {
            $n= $n + 1;
            echo $n;
            ?>

        <h1><?php
            echo $datos->nombre ?></h1>
        <div class="w3-row-padding AccesorioAdminContenidoCarta">
            <div class="AccesorioimagenParticular">
                <img class="imagenUnica" src="<?php echo $_SESSION['public'] . "img/" . $datos->imagen ?>"
                     alt="<?php echo $datos->modelo ?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p><?php echo $datos->precio ?>€</p>
                    <p><?php echo $datos->caracteristicas ?></p>
                    <br>

                </div>
            </div>

            <a href="<?php echo $_SESSION['home'] . "admin/accesorios/modificar/"  . $row->id ?>" title="Modificar"
               type="button" class="btn btn-outline-light">Modificar</a>

            <a href="<?php echo $_SESSION['home'] . "carrito" . $row->id ?>" title="AñadirAlCarro"
               type="button" class="btn btn-outline-dark">Añadir al carro</a>

        </div>
        <?php } ?>

    </article>

</div>