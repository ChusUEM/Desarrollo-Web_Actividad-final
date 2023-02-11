<?php
$a = "a";
var_dump($a);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inmobiliaria</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-1 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Inmobiliaria</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Encuentra TU casa al mejor precio</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">

                <h2 class="fw-bolder">Piso Amplio en el Centro</h2> <br></br>

                <h4 class="fw-bolder">Precio: 209.900€</h4><br></br>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                    
                </div>
  
                            <img class="card-img-top" src="img/casa1/bloque.jpg" alt="..." /></div>
                            <!-- Product details-->
                            <br></br>
                            <br></br>

                            <!-- <h6>Chalet construido en el año 2004, de altas calidades, cuatro plantas incluida garaje.</h6> -->
                                
                                <br></br>
                                <br></br>

                
                <!-- Section-->
                <section class="py-5" align="center">
                <div class="container px-4 px-lg-5 mt-5" >

                <h2 class="fw-bolder" align="center">Características de la vivienda</h2> <br></br>
                <style>
                    table, td, th {  
                    border: 1px solid #ddd;
                    text-align: left;
                    }

                    table {
                    border-collapse: collapse;
                    width: 100%;
                    }

                    th, td {
                    padding: 15px;
                    }
                </style>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "ActividadFinal";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Inmuebles WHERE ID = 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                echo '<table>';
                echo "<tr><td>ID</td><td>DESCRIPCION</td><td>DIRECCION</td><td>DIMENSION</td>
                          <td>HABITACIONES</td><td>BAÑOS</td><td>EMAIL</td><td>RESERVADA</td>
                          <td>POPULAR</td><td>RESERVAR</td></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<form method='POST' action='reserve.php'  enctype='multipart/form-data'>";
                    echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td><td>" . $row["DESCRIPCION"] . "</td>
                          <td>" . $row["DIRECCION"] . "</td>
                          <td>" . $row["DIMENSION"] . "</td><td>" . $row["HABITACIONES"] . "</td>
                          <td>" . $row["BAÑOS"] . "</td><td>" . $row["EMAIL"] . "</td>
                          <td>" . $row["RESERVADA"] . "</td><td>" . $row["POPULAR"] . "</td>
                          <td>" . "<input id='idReserva' type='radio' value=".$row['ID'].">". "</td>";   
                    echo "</tr>";
                    }
                    echo "</form>";
                echo '</table>';
                } else {
                echo "0 results";
                }
                // 
                //echo "cerrando conexión";
                mysqli_close($conn);
                ?>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <? if ($row['RESERVADA'] === 0):?>
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="reserve.php">Reservada</a></div> <br></br>
                                <? endif; ?>
                                
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index.php">Seguir navegando</a></div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Creado por Sofía Corral Caballero y Jesús Fernando Franciso de Granada</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
