<?php
require_once 'auth-service/vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$client = new Google_Client();
$client->setClientId('631022063904-0n6jn3vcl53bi1gp1urp0o721ef0q2p0.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://animalresort.com.co/web/auth-service/controladorGoogle.php');
$client->addScope("email");

$authUrl = $client->createAuthUrl();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body {
            background: #9dcd55;
            background: linear-gradient(to right, #3c8735, #9dcd55);
        }
        /* Estilo para el bot��n de inicio de sesi��n */
    .center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px; /* Ajusta el margen superior seg��n sea necesario */
   }
    .google-login-btn {
      background-color: #35e850;
      color: #fff;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      padding: 10px 15px;
      border-radius: 5px;
      font-size: 16px;
      transition: background-color 0.3s;
    }

    .google-login-btn:hover {
      background-color: #87c190;
    }

    .google-icon {
      margin-right: 10px;
    }
    </style>
</head>

<body>

    <div class="container w-85 mt-5 rounded shadow">
        <div class="row aling-items-stretch">
            <div class="col bg-white p-5 rounded">
                <div style="text-align: center;">
                    <img src="statics/logoAnimalR.png" width="48" alt="">
                </div>

                <h2 class="fw-bold text-center py-5">Bienvenido</h2>

                <form action="" method="post">
                    
                    <div>
                         <?php
                          include("auth-service/conexion.php");
                         include("auth-service/controlador.php");
                        ?>

                         <div class="mb-4">
                             <label for="email" class="form-label">Correo electronico</label>
                             <input type="email" class="form-control" name="email">
                          </div>

                         <div class="d-grid">
                            <input name="btn" class="btn btn-success" type="submit" value="Iniciar sesion">
                         </div>

                    

                         <div class="center-container">
                             <?php
                          include("auth-service/conexion.php");
                        ?>
                            <div class="google-login-btn">
                             
                             <a href="<?php echo $authUrl; ?>" class="google-login-btn">
                              <span class="google-icon"><i class="material-icons">account_circle</i></span>
                              Iniciar sesion con Google
                             </a>
                            </div>
                         </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>