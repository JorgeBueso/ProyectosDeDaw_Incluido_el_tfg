<div id="ContenidoFicha" class="w3-row-padding">

    <article>

        <?php if (isset($_SESSION['usuario'])){ ?>

            <h1>
                Usuario: <strong name="nombre_usuario"><?php echo $_SESSION['usuarios'.'id'] ?></strong>
            </h1>

        <?php }

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
                     alt="modelo:<?php echo $datos->nombre ?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <p>precio:<?php echo $datos->precio ?>€</p>
                    <p><?php echo $datos->caracteristicas ?></p>
                    <br>

                </div>
            </div>

            <a href="<?php echo $_SESSION['home'] . "admin/accesorios/editar/" . $datos->id ?>" title="Editar" type="button" class="btn btn-outline-light">
                Editar
            </a>


            <a href="<?php echo $_SESSION['home'] . "cesta"?>" title="VerlaCesta"
               type="button" class="btn btn-outline-dark">ver la cesta</a>

            <a href="<?php echo $_SESSION['home'] . "AnadirCesta". $row->slug?>" class="btn btn-info" title="AñadirCesta">Añadir a la cesta</a>

        </div>
        <?php } ?>
    </article>

</div>