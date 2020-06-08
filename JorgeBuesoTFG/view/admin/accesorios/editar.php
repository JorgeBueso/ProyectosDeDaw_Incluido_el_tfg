<article class="Crear_Editar">
    <div class="row">
        <div class="row-md-5">
            <h3>
                <?php if ($datos->id) { ?>
                    <span>Editar <?php echo $datos->nombre ?></span>
                <?php } else { ?>
                    <span>Nuevo accesorio</span>
                <?php } ?>
            </h3>


            <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
            <form class="col-md-7" method="POST" enctype="multipart/form-data"
                  action="<?php echo $_SESSION['home'] ?>admin/accesorios/editar/<?php echo $id ?>">

                <div class="col m12 l6 center-align">
                    <div class="file-field input-field">
                        <div class="btn btn-outline-light">

                            <input type="file" name="imagen">
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <!--                    imagen del accesorio-->
                    <?php if ($datos->imagen) { ?>
                        <img src="<?php echo $_SESSION['public'] . "img/" . $datos->imagen ?>"
                             alt="<?php echo $datos->nombre ?>">
                    <?php } ?>
                </div>

                <!--                DATOS DEL ACCESORIO-->
                <div class="col ">

                    <div class="row">
                        <div class="input-field col">
                            <h9>grupo:</h9>
                            <input id="grupo" type="text" placeholder="Grupo(Movilidad,Alimentación etc.)" name="grupo"
                                   value="<?php echo $datos->grupo ?>">
                        </div>

                        <div class="input-field col ">
                            <h9>tipo:</h9>
                            <input id="tipo" type="text" placeholder="Tipo(baston,menaje etc.)" name="tipo"
                                   value="<?php echo $datos->tipo ?>">
                        </div>

                        <div class="input-field col ">
                            <h9> nombre:</h9>
                            <input id="nombre" type="text" placeholder="Nombre" name="nombre"
                                   value="<?php echo $datos->nombre ?>">
                        </div>


                        <div class="input-field col  ">
                            <h9> precio:</h9>
                            <input id="precio" type="text" placeholder="Precio" name="precio"
                                   value="<?php echo $datos->precio ?>">
                        </div>

                        <div class="input-field col">
                            <h9> Entradilla:</h9>
                            <textarea id="texto" class="materialize-textarea" placeholder="Entradilla"
                                      name="texto"><?php echo $datos->entradilla ?></textarea>

                        </div>

                        <div class="input-field col">
                            <h9> Características:</h9>
                            <textarea id="texto" class="materialize-textarea" placeholder="Caracteristicas"
                                      name="texto"><?php echo $datos->caracteristicas ?></textarea>

                        </div>
                    </div>
                </div>

                <!--BOTONES-->
                <div class="input-field col s12">
                    <a href="<?php echo $_SESSION['home'] ?>admin/accesorios" title="Volver">
                        <button class="btn btn-outline-warning" type="button">Volver
                            <span uk-icon="icon: reply ; color:yellow"></span>
                        </button>
                    </a>
                    <button class="btn btn-outline-light" type="submit" name="guardar">Guardar

                    </button>
                </div>


            </form>
        </div>


    </div>
</article>


