<!DOCTYPE html>
<html>
<title>IncioDeSesion</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="<?php $_SESSION['public'] ?>css/app.css">
<body>
<?php foreach ($datos as $row) { echo("app/index")?>
    <article class="col m12 l6">
        <div class="card horizontal small">

            <div class="card-stacked">
                <div class="card-content">
                    <h4><?php echo $row->usuario ?></h4>
                    <p><?php echo $row->clave ?></p>
                </div>
            </div>
        </div>
    </article>
<?php } ?>
</body>
</html>
