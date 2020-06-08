<article class="personal">

    <div class="container">
        <h3 class="mt-5">Elija el personal que necesite</h3>
        <hr>
        <div class="row">
            <div class="col-8 col-md-8">
                <!-- Contenido -->

                <form method="post">

                    <label class="heading">Seleccione sus necesidades:</label>
                    <?php foreach ($datos as $row) {
                         ?>
                        <div class="checkbox">

                            <label><input type="checkbox" name="check_lista[]"
                                          value="<?php echo $row->cargo ?>"><?php echo $row->cargo ?></label>
                        </div>
                    <?php } ?>

                    <br>
                    <button type="submit" class="btn btn-primary" name="enviar">Pedir este personal</button>
                    <!----- Including PHP Script ----->
                    <?php
                    if (isset($_POST['enviar'])) {
                        if (!empty($_POST['check_lista'])) {
// Contando el numero de input seleccionados "checked" checkboxes.
                            $checked_contador = count($_POST['check_lista']);
                            echo "<p>Has seleccionado las siguientes " . $checked_contador . " opcion(es):</p> <br/>";
// Bucle para almacenar y visualizar valores activados checkbox.
                            foreach ($_POST['check_lista'] as $seleccion) {
                                echo "<p>" . $seleccion . "</p>";
                            }
                            echo "<br/><b>Nota :</b> <span>La asistencia se pondrá en contacto lo mas pronto posible</span>";
                        } else {
                            echo "<p><b>Por favor seleccione al menos una opción.</b></p>";
                        }
                    }

                    ?>
                </form>

                <!-- Fin Contenido -->
            </div>
        </div>

        <!-- Fin row -->

    </div>
</article>