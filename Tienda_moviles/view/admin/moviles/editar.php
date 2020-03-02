<h3>
    <?php if ($datos->id){ ?>
        <span>Editar <?php echo $datos->modelo ?></span>
    <?php } else { ?>
        <span>Nuevo movil</span>
    <?php } ?>
</h3>

<!--//////////////////////////////////////////////////////////////-->
<!--NUEVO MOVIL-->
<div class="row" style="color: white">
    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <form class="col s12" method="POST" enctype="multipart/form-data" action="<?php echo $_SESSION['home'] ?>admin/moviles/editar/<?php echo $id ?>">
        <div class="col m12 l6">
            <div class="row">
                <div class="input-field col s12">
                    <input id="modelo" type="text" placeholder="Modelo" name="modelo" value="<?php echo $datos->modelo ?>">

                </div>
                <div class="input-field col s12">
                    <input id="marca" type="text" placeholder="Marca" name="marca" value="<?php echo $datos->marca ?>">

                </div>
                <div class="input-field col s12">
                    <input id="precio" type="text" placeholder="Precio(€)" name="precio" value="<?php echo $datos->precio ?>">
                </div>
                <div class="input-field col s12">
                        <textarea id="texto" class="materialize-textarea" placeholder="Caracteristicas" name="texto"><?php echo $datos->caracteristicas ?></textarea>

                </div>

            </div>
        </div>
        <div class="col m12 l6 center-align">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <?php if ($datos->imagen){ ?>
                <img src="<?php echo $_SESSION['public']."img/".$datos->imagen ?>" alt="<?php echo $datos->modelo ?>">
            <?php } ?>
        </div>


        <div class="row">
            <div class="input-field col s12">
                <a href="<?php echo $_SESSION['home'] ?>admin/moviles" title="Volver">
                    <button class="btn waves-effect waves-light" type="button">Volver
                        <i class="material-icons right">replay</i>
                    </button>
                </a>
                <button class="btn waves-effect waves-light" type="submit" name="guardar">Guardar
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </div>
    </form>
</div>