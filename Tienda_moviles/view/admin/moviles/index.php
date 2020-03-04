<div class="row">
    <!--Nuevo-->
    <article class="col s12 l3">
        <div class="card horizontal large">
            <div class="card-stacked">
                <div class="card-content">
                    <span uk-icon="icon: phone; ratio: 10"></span>
                    <h4 class="grey-text">
                        nuevo movil
                    </h4>
                </div>
                <div class="card-action">
                    <a href="<?php echo $_SESSION['home'] . "admin/moviles/crear" ?>" title="Añadir nueva noticia">
                        <span uk-icon="icon: plus;"></span>
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php foreach ($datos as $row) { ?>
        <article class="col s12 l3">
            <div class="card large">
                    <?php if ($row->imagen) { ?>
                        <div class="card-image">
                            <img style="width: 15rem" src="<?php echo $_SESSION['public'] . "img/" . $row->imagen ?>"
                                 alt="<?php echo $row->modelo ?>">
                        </div>
                    <?php } ?>
                <div class="card-stacked">
                    <div class="card-content">
                        <?php if (!$row->imagen) { ?>
                            <i class="fas fa-file-image medium"></i>
                        <?php } ?>
                        <h4 style="width: 42rem">
                            <?php echo $row->modelo ?>
                        </h4>
                        <strong>URL amigable:</strong> <?php echo $row->slug ?><br>
                        <strong>Precio:</strong> <?php echo $row->precio ?>€
                    </div>
                    <div class="card-action">
                        <a href="<?php echo $_SESSION['home'] . "admin/moviles/editar/" . $row->id ?>" title="Editar">
                            <i class="material-icons">edit</i>
                        </a>
                        <?php $title = ($row->activo == 1) ? "Desactivar" : "Activar" ?>
                        <?php $color = ($row->activo == 1) ? "green-text" : "red-text" ?>
                        <?php $icono = ($row->activo == 1) ? "mood" : "mood_bad" ?>
                        <a href="<?php echo $_SESSION['home'] . "admin/moviles/activar/" . $row->id ?>"
                           title="<?php echo $title ?>">
                            <i class="<?php echo $color ?> material-icons"><?php echo $icono ?></i>
                        </a>
                        <?php $title = ($row->home == 1) ? "Quitar de la home" : "Mostrar en la home" ?>
                        <?php $color = ($row->home == 1) ? "green-text" : "red-text" ?>
                        <a href="<?php echo $_SESSION['home'] . "admin/moviles/home/" . $row->id ?>"
                           title="<?php echo $title ?>">
                            <i class="<?php echo $color ?> material-icons">home</i>
                        </a>
                        <a  data-toggle="collapse" href="#collapseExample" role="button"
                           aria-expanded="false" aria-controls="collapseExample" title="Borrar">
                            <i class="material-icons">delete</i>
                        </a>
                    </div>
                </div>
            </div>
            <!--Confirmación de borrar-->
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <span class="card-title grey-text text-darken-4"><strong><?php echo $row->modelo ?></strong></span>
                    <p>
                        ¿Está seguro de que quiere borrar el movil?<br>
                        Esta acción no se puede deshacer.Si no desea borrar el teléfono, vuelva a pulsar el botón
                    </p>
                    <a href="<?php echo $_SESSION['home'] . "admin/moviles/borrar/" . $row->id ?>" title="Borrar">
                        <button class="btn waves-effect waves-light" type="button">Borrar
                            <i class="material-icons right">delete</i>
                        </button>
                    </a>
                </div>
            </div>
        </article>

    <?php } ?>

</div>
