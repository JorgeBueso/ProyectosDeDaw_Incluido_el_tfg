
<?php foreach ($datos as $row) { ?>
    <article>
        <header class="entry-header">
            <h2 class="entry-title" itemprop="headline">
                <a class="entry-title-link" rel="bookmark"
                   href="">
                    <?php echo $row->titulo ?>
                </a>
            </h2>

        </header>
        <div >
            <a class="entry-image-link" aria-hidden="true">
                <img sizes="(max-width: 300px) 100vw, 300px"
               src="<?php echo $_SESSION['public'] . "img/" . $row->imagen ?>"
                     alt="<?php echo $row->nombre ?>">
            </a>
            <p><?php echo $row->entradilla ?></p>

            <p>Pertenece a:<?php echo $row->grupo ?></p>
        </div>
    </article>

<?php } ?>


