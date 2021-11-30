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
        <h1 class="center">Consultame</h1>
        <table width=100%>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->alumnos as $row) {
                    $alumno = new Alumno();
                    $alumno = $row;

                ?>
                    <tr>
                        <td><?= $alumno->matricula; ?></td>
                        <td><?= $alumno->nombre; ?></td>
                        <td><?= $alumno->apellido; ?></td>
                        <td><a href='<?= constant('URL') . 'consulta/verAlumno/' . $alumno->matricula ?>'>Editar</a></td>
                        <td><a href='<?= constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula ?>'><button>Eliminar</button></a></td>

                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </main>

    <?php require_once 'views/footer.php' ?>
</body>

</html>