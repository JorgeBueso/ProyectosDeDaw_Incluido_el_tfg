<div class="row">

    <?php foreach ($datos as $row) { ?>

        <article class="col-12 col-xs-12 col-md-3 col-lg-3">
            <div class="card horizontal small">

                <div class="imagenCarta">
                    <img src="<?php echo $_SESSION['public'] . "img/" . $row->imagen ?>"
                         alt="<?php echo $row->nombre ?>">
                </div>

                <div class="ContenidoCarta">
                    <div class="DatosCarta">
                        <div class="nombre_accesorio">
                            <h4 name="nombre"><?php echo $row->nombre ?></h4>
                        </div>
<!--                        <p> En stock: --><?php //echo $row->stock ?><!--</p>-->
                        <p> <?php echo $row->entradilla ?></p>
                        <p name="precio">Precio:<?php echo $row->precio ?>€</p>
                    </div>

                        <a href="<?php echo $_SESSION['home'] . "accesorioAdmin/" . $row->slug ?>" class="btn btn-primary">Detalles</a>

                        <a href="<?php echo $_SESSION['home']."AnadirCesta".$row->id ?>" class="btn btn-primary">Añadir a la cesta</a>


                </div>
            </div>
        </article>

    <?php } ?>

</div>