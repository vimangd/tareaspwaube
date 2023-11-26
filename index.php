<?php
    $productos = array(
        array("id" => 1, "nombre" => "Tarjeta gráfca Asus Rog Strix RTX 4090", "imagen" => "img/img1.png", "descripcion" => "OC Edition 24GB GDDR6X", "precio" => 2500),
        array("id" => 2, "nombre" => "Samsung Odyssey NEO G9", "imagen" => "img/img2.png", "descripcion" => "49 pulgadas 240HZ Resolución(5120x1440)", "precio" => 2399.99),
        array("id" => 3, "nombre" => "Intel Core i9-13900K", "imagen" => "img/img3.png", "descripcion" => "Core i9 13th Gen Raptor Lake 24-Core (8P+16E) P-core Base Frequency: 3.0 GHz E-core Base Frequency: 2.2 GHz LGA 1700 125W", "precio" => 578.74)   
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de productos gamer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/stylecp3.css">
</head>
<body>
    <header>
        <h1>Tienda de productos gamer</h1>
    </header>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Imagen</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($productos as $producto){ ?>
                    <div class="fila">
                        <tr>
                            <td>
                                <img src="<?= $producto['imagen']?>" style="width: 200px; heigth: 200px; object-fit:cover;">
                            </td>
                            <td>
                                <h3><?= $producto['nombre']?></h3>
                            </td>
                            <td>
                                <h3><?= $producto['descripcion']?></h3>
                            </td>
                            <td>
                                <h3><?= $producto['precio']?></h3>
                            </td>
                            <td>
                                <button class="btn btn-primary" onclick="agregarAlCarrito(<?php echo $producto['id']; ?>)">Agregar al carrito</button>
                            </td>
                        </tr>
                    </div>
            <?php } ?>
        </tbody>
    </table>
    <h2>Carrito de compras</h2>
    <hr>
    <div class="carrito" id="carrito"></div>
    <h2>Total a pagar: <span id="pagar"></span></h2>
    <hr>
    <a class="btn btn-primary" href="./index.html">Volver al inicio</a>
    <script>
        let productos = <?php echo json_encode($productos, JSON_PRETTY_PRINT); ?>;
    </script>
    <script src="./script/scriptcp3.js"></script>                
</body>
</html>