<div id="ContenidoFicha" class="w3-row-padding">
    <article>
        <h1><?php
            echo $datos->nombre ?></h1>
        <div class="ContenidoCarta w3-row-padding ">
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
            <a href="<?php echo $_SESSION['home']?>admin" target="_blank"
               type="button" class="btn btn-outline-light">
                Inicio de sesion
            </a>
        </div>
    </article>
</div>