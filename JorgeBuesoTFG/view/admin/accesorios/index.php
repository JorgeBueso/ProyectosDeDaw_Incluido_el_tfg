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
                            <h4><?php echo $row->nombre ?></h4>
                        </div>
                        <p> En stock: <?php echo $row->stock ?></p>
                        <p>Precio:<?php echo $row->precio ?>€</p>
                    </div>

                        <a href="<?php echo $_SESSION['home'] . "accesorio/" . $row->slug ?>" class="btn btn-primary">Detalles</a>
                        <a href="<?php echo $_SESSION['home'] ?>carrito" class="btn btn-primary">Añadir al carro</a>

                </div>
            </div>
        </article>

    <?php } ?>

</div>