<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de calificaciones</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <style>
        body{
            min-height: 100vh;
            background: linear-gradient(rgba(5,7,12,0.75),rgba(5,7,12,0.75)), 
            url(<?= $fondo?>) no-repeat center center fixed;
            background-size: cover;
        }
    </style>
    <div class="container">
        <header>
            <h1 class="center">Sistema de calificación</h1>
            <h4 class="center"><span>Docente: </span><?= $nombre?></h4>
        </header>
        <div class="container">
            <div class="row center">

            </div>
            <div class="row">
                <div class="col">
                    <img src="<?= $inicio?>" id="img_achicada">
                </div>
                <div class="col">
                    <h2>Inicie sesión</h2>
                    <form action="">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div> 

                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="contrasena" name="contrasena">
                        </div>
                    
                        <button type="submit" id="boton_acceso" name="boton_acceso" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
            <a class="btn btn-primary" href="../index.php"><h3>Volver al inicio</h3></a>
        </div>
    </div>
    <script src="./bootstrap/bootstrap.bundle.min.js"></script>
    <script src="./bootstrap/popper.min.js"></script>
</body>
</html>