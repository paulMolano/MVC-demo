<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php require_once 'views/header.php' ?>

    <main>
        <h1 class="center">Detalle de <?= $this->alumno->matricula ?></h1>

        <div class="center"><?= $this->mensaje ?></div>

        <form action="<?= constant('URL'); ?>consulta/actualizarAlumno" method="post">

            <p>
                <label for="matricula">Matricula</label><br>
                <input type="text" name="matricula" id="" value="<?= $this->alumno->matricula ?>" readonly>
            </p>

            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="" value="<?= $this->alumno->nombre ?>" required>
            </p>

            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="" value="<?= $this->alumno->apellido ?>" required>
            </p>

            <p>
                <input type="submit" value="Actualizar">
            </p>



        </form>
    </main>

    <?php require_once 'views/footer.php' ?>
</body>

</html>