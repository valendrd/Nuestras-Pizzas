<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="css/insert_products.css">
</head>

<body>
    <nav class="navtop">
        <div>
            <h1>Panel de Administrador</h1>
            <a href="logout.php">Logout</a>
            </div>
            <a href="insert_products.php">Insertar productos</a>
    </nav>
    <div class=" content">
        <?php
        session_start();
        $_SESSION['logueado'];
        if ($_SESSION['logueado']) {
            echo "Bienvenido/a  " . $_SESSION['username'];
            echo "<br>";
            echo "Horario de conexión  " . $_SESSION['time'];
        }
        echo "<table class='table table-bordered table-striped' id='example'>
                 <thead class='thead-dark'>
                 <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Fecha de Alta</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                </tr>
            </thead>
            <tbody>";
        include_once("config_products.php");
        include_once("db.class.php");
        $link = new Db();
        $sql = "SELECT c.category_name,p.id_product,p.product_name,p.price,date_format(p.start_date,'%d/%m/%Y') as 'DATE' FROM products p inner join categories c on p.id_category=c.id_category";
        $stmt = $link->run($sql, NULL);
        $data = $stmt->fetchAll();
        foreach ($data as $row) {
        ?>
            <tr>
                <td>
                    <?php echo $row['id_product']; ?>
                </td>
                <td>
                    <?php echo $row['product_name']; ?>
                </td>
                <td>
                    <?php echo $row['category_name']; ?>
                </td>
                <td>
                    <?php echo $row['price']; ?>
                </td>
                <td>
                    <?php echo $row['DATE']; ?>
                </td>
                <td>
                    <a href="#">Elimminar</a>
                </td>
                <td>
                    <a href="#">Actualizar</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        </table>
    </div>
    <nav>
                <ul>
                    <li><a href="insert_products.php">INSERTAR PRODUCTOS</a></li>

                </ul>

            </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
    <script>
        var table = new DataTable('#example', {
            info: true,
            ordering: true,
            paging: true,
            language: {
                url: 'es-MX.json',
            },
        });
    </script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

</body>

</html>