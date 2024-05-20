<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background: #9dcd55;
            background: linear-gradient(to right, #3c8735, #9dcd55);
        }
    </style>
</head>

<body>

    <div class="container w-85 mt-5 rounded shadow">
        <div class="row aling-items-stretch">
            <div class="col bg-white p-5 rounded">
                <div style="text-align: center;">
                    <img src="logoAnimalR.png" width="48" alt="">
                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                <form action="" method="post">

                    <?php
                    include("conexion.php");
                    include("controlador.php");
                    ?>

                    <div class="mb-4">
                        <label for="email" class="form-label">Correo electronico</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="d-grid">
                        <input name="btn" class="btn btn-success" type="submit" value="Iniciar sesion">
                    </div>


                    <div class="enlace">
                     <img src="imagenes/ui.svg">
                     <?php require ('controlador.php')?>
                    <a href="<?php echo $client->createAuthUrl() ?>">Iniciar sesión con Google</a>
                   </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>