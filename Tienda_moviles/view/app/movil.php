<div class="row">
    <article class="col s12">
        <div class="card horizontal large noticia">
            <div class="card-image">
                <img src="<?php echo $_SESSION['public']."img/".$datos->imagen ?>" alt="<?php echo $datos->modelo ?>">
            </div>
            <div class="card-stacked">
                <div class="card-content">
                    <h4><?php echo $datos->modelo ?></h4>
                    <p><?php echo $datos->precio ?>€</p>
                    <p><?php echo $datos->caracteristicas ?></p>
                    <br>
                    <p>
                        <strong>Marca</strong>: <?php echo $datos->marca ?>
                    </p>
                </div>
            </div>
        </div>
    </article>
</div>