<?php foreach ($datos as $row) { ?>
    <article>
        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline">
                <a class="entry-title-link" rel="bookmark"
                   href="">
                    <?php echo $row->titulo ?>
                </a>
            </h2>
            <p class="entry-meta">
                <time class="entry-time" itemprop="datePublished"
                      datetime="2020-05-05T12:45:17+00:00"><?php echo $row->fecha_de_subida ?></time>

                </span>

            </p>
        </header>
        <div class="DatosCarta">
            <a class="entry-image-link" aria-hidden="true">
                <img sizes="(max-width: 300px) 100vw, 300px">
                <img src="<?php echo $_SESSION['public'] . "img/" . $row->imagen ?>"
                     alt="<?php echo $row->nombre ?>">
            </a>
            <p><?php echo $row->entradilla ?></p>

            <p>Pertenece a:<?php echo $row->grupo ?></p>
        </div>
    </article>

<?php } ?>


