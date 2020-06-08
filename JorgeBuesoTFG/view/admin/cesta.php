<?php
$nombreUsuario = $_SESSION['usuario'];
$connect = mysqli_connect("localhost", "root", "root", "tfg_bbdd");
$sql = "SELECT * FROM cesta c INNER JOIN accesorios a ON c.id_accesorio = a.id
            JOIN usuarios u ON c.usuario_id = (SELECT u2.id FROM usuarios u2 WHERE u2.usuario='$nombreUsuario') WHERE u.usuario='$nombreUsuario';";
$result = mysqli_query($connect, $sql);
?>

<br />
<div class="container" style="background: cornsilk">
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
                            <img src="<?php echo $_SESSION['public'] . "img/" . $row["imagen"] ?>"
                                 alt="<?php echo "imagen de ".$row["nombre"]?>">
                        </td>
                        <td><?php echo $row["nombre"];?></td>
                        <td><?php echo $row["cantidad"]; ?></td>
                        <td><?php echo $row["precio"]; ?></td>
                       <td><a href="<?php echo $_SESSION['home']."admin/cesta/borrar/".$row["id_cesta"]?>">borrar</a></td>
                    </tr>

                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>

