<div class="row" >
    <!--Nuevo-->
    <article class="col col-xl">
        <div class="card horizontal admin">
            <div class="card-stacked">
                <div class="card-content">
                    <span uk-icon="icon:users ;ratio: 10"></span>
                    <h4 class="grey-text">
                        nuevo usuario
                    </h4>

                </div>
                <div class="card-action">
                    <a href="<?php echo $_SESSION['home']."admin/usuarios/crear" ?>" title="Añadir nuevo usuario">
                        <span uk-icon="icon: plus">nuevo usuario</span>
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php foreach ($datos as $row){ ?>
        <article class="col s12 l6">
            <div class="card horizontal  sticky-action admin">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="fab fa-500px"></i>
                        <h4>
                            <?php echo $row->usuario ?>
                        </h4>
                        <strong>Usuarios: </strong><?php echo ($row->usuarios) ? "Sí" : "No" ?><br>
                        <strong>Accesorios: </strong><?php echo ($row->moviles) ? "Sí" : "No" ?>
                    </div>
                    <div class="card-action">
                        <a href="<?php echo $_SESSION['home']."admin/usuarios/editar/".$row->id ?>" title="Editar">
                            <span uk-icon="icon: pencil;"></span>
                        </a>
                        <?php $title = ($row->activo == 1) ? "Desactivar" : "Activar" ?>
                        <?php $color = ($row->activo == 1) ? "green-text" : "red-text" ?>
                        <?php $icono = ($row->activo == 1) ? "Activado" : "desactivado" ?>
                        <a href="<?php echo $_SESSION['home']."admin/usuarios/activar/".$row->id ?>" title="<?php echo $title ?>">
                            <i class="<?php echo $color ?> material-icons"><?php echo $icono ?></i>
                        </a>
                        <a href="#" class="activator" title="Borrar">
                            <i class="material-icons">delete</i>
                        </a>
                    </div>
                </div>

                <!--Confirmación de borrar-->
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Borrar usuario<i class="material-icons right">close</i></span>
                    <p>
                        ¿Está seguro de que quiere borrar al usuario<strong><?php echo $row->usuario ?></strong>?<br>
                        Esta acción no se puede deshacer.
                    </p>
                    <a href="<?php echo $_SESSION['home']."admin/usuarios/borrar/".$row->id ?>" title="Borrar">
                        <button class="btn" type="button">Borrar
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </a>
                </div>
            </div>
        </article>
    <?php } ?>
</div>