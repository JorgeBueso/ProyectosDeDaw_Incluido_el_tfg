<!DOCTYPE html>
<html>
<title>MASCOTAS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel ="stylesheet" href="<?php $_SESSION['public']?>css/app.css">
<body>

<?php //foreach ($datos as $row){?>
    <div class="card" >
<!--        <img class="card-img-top" src="--><?php //echo $_SESSION['public']."img/".$row->imagen?><!--" alt="Card image cap">-->
        <div class="card-body">
<!--            <h5 class="card-title">--><?php //echo $row->nombre?><!-- </h5>-->
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="../app/mascota.php" class="btn btn-primary">Detalles</a>
        </div>
    </div>
<?php//}
echo("eeeeewwafw");?>

</body>
</html>
