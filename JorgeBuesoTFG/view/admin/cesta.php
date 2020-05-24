<!--<div id="ContenidoFicha" class="w3-row-padding">-->
<!--    <article class="w3-col s">-->
<!--        <h1>el nombre</h1>-->
<!--        <div class="w3-row-padding ">-->
<!--            <div class="AccesorioimagenParticular">-->
<!--                <img class="imagenUnica" src="../../public/img/baston-cuatro-apoyos.jpg"-->
<!--                     alt="la imagen">-->
<!--            </div>-->
<!--            <div class="card-stacked">-->
<!--                <div class="card-content">-->
<!--                    <p>nombre</p>-->
<!--                    <p>las carateristicas</p>-->
<!--                    <br>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </article>-->
<!--</div>-->
<!--<div id="ContenidoFicha" class="w3-row-padding">-->
<!---->
<!--    <article>-->
<!--        cesta-->
<!--        --><?php
//        $n=0;
//        foreach ($datos as $row) {
////            $n= $n + 1;
////            echo $n;
////            ?>
<!--            <h1>usuario_id:--><?php
//                echo $datos->usuario_id  ?><!--</h1>-->
<!--            <h1>id_accesorio: --><?php
//                echo $datos->id_accesorio  ?><!--</h1>-->
<!---->
<!---->
<!--        --><?php //} ?>
<!---->
<!--    </article>-->
<!---->
<!--</div>-->

<!--<div class="container" style="width:500px;">-->
<!---->
<!--    <div class="table-responsive">-->
<!--        <table class="table table-striped" style="color:white">-->
<!---->
<!--            --><?php //foreach ($datos as $row) { ?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $_SESSION['usuario'] ?><!--</td>-->
<!--                    <td>--><?php //echo $datos->usuario_id ?><!--</td>-->
<!--                    <td>--><?php //echo $datos->id_accesorio ?><!--</td>-->
<!---->
<!---->
<!--                </tr>-->
<!--                --><?php
//            }
//
//
//            ?>
<!--        </table>-->
<!--    </div>-->
<!--</div>-->




<?php
$nombreUsuario = $_SESSION['usuario'];
$connect = mysqli_connect("localhost", "root", "root", "tfg_bbdd");
$sql = "SELECT * FROM cesta c INNER JOIN accesorios a ON c.id_accesorio = a.id
            JOIN usuarios u ON c.usuario_id = (SELECT u2.id FROM usuarios u2 WHERE u2.usuario='$nombreUsuario') WHERE u.usuario='$nombreUsuario';";
$result = mysqli_query($connect, $sql);
?>

<br />
<div class="container" style="width:500px; background: cornsilk">
    <h3 align="">Cesta de:<?php echo ' '.$nombreUsuario ?> </h3><br />
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Nombre Accesorio</th>
                <th>Cantidad</th>
                <th>Precio Accesorio</th>

            </tr>
            <?php
            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $_SESSION['public'] . "img/" . $row["nombre"] ?>"
                                 alt="<?php echo "imagen de ".$row["nombre"]?>">
                        </td>
                        <td><?php echo $row["nombre"];?></td>
                        <td><?php echo $row["cantidad"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                       <td><a href="<?php echo $_SESSION['home']."borrarCesta".$row["id"] ?>">borrar</a></td>
                    </tr>

                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>

