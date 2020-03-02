
<div class="row">

    <?php foreach ($datos as $row){ ?>

        <article class="col m12 l6">
            <div class="card horizontal small">
                <div class="card-image">
                    <img src="<?php echo $_SESSION['public']."img/".$row->imagen ?>" alt="<?php echo $row->modelo ?>">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h4><?php echo $row->modelo ?></h4>
                        <p> <?php echo $row->marca ?></p>
                        <p>Precio:<?php echo $row->precio?>€</p>
                    </div>

                    <div>
                        <a href="<?php echo $_SESSION['home']."movil/" .$row->slug ?>" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            </div>
        </article>

    <?php } ?>

</div>