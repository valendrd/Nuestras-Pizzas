<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria Pizze Il Napolitano</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Link font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div id="header-container">
            <div id="logo">
                <img src="img/pizza.svg" alt="">
                <img class="logo-text" src="img/text.svg" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">NOSOTROS</a></li>
                    <li><a href="#">SUCURSALES & DELIVERY</a></li>
                    <li><a href="#">CONTACTO</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="main-content">
        <h2 class="animate__animated animate__backInLeft">NUESTRAS PIZZAS</h2>
        <div id="cart">
            <i class="fa badge" id="badge" value=0><i class="fa-solid fa-cart-shopping fa-lg"></i></i>
        </div>
        <ul class="gallery">
            <?php
            include_once("config_products.php");
            include_once("db.class.php");

            // Crear una instancia de la clase Db
            $link = new Db();

            // Definir la consulta
            $sql = "SELECT c.category_name, p.image, p.product_name, p.price, 
                           DATE_FORMAT(p.start_date, '%d/%m/%Y') AS date 
                    FROM products p 
                    INNER JOIN categories c ON p.id_category = c.id_category 
                    ORDER BY p.price";

            // Ejecutar la consulta y obtener los resultados
            $data = $link->run($sql);

            // Mostrar los resultados
            foreach ($data as $row) {
            ?>
                <li>
                    <div class="card"> <!-- card es box -->
                        <figure> 
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" class="img-jpg" alt="fugazzeta" />
                            <figcaption>
                                <h3><?php echo htmlspecialchars($row['category_name'] . ' ' . $row['product_name']); ?></h3>
                                <p>$<?php echo htmlspecialchars($row['price']); ?></p>
                                <time><?php echo htmlspecialchars($row['date']); ?></time>
                            </figcaption>
                            <button class="button" value="1">
                                Añadir al carrito <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </figure>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>

    <footer>
        <p>Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> Todos los derechos reservados
        </p>
    </footer>

    <nav id="social">
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-facebook"></i></a>
        <a href="#"><i class="fa-brands fa-square-instagram"></i></a>
    </nav>

    <script src="js/main.js"></script>
</body>

</html>