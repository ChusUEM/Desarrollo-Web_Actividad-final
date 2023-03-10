<!-- Esta página tiene que mostrar una secuencia de las casas populares -->
<?php
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

                <h2 class="fw-bolder">Inmuebles en oferta</h2> <br></br>

                <!-- Aquí podemos meter una secuencia con las imágenes de las casas en oferta -->
                <h4 class="fw-bolder">Precio: 295.000€</h4><br></br>

                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        
                    </div>
                            <!-- Show products (Seleccionamos productos de la base de datos que cumplan con la query)-->
                            <!-- Crear conexión con la base de datos -->
                            <?php
                            // Create connection
                            $conn = mysqli_connect("credentials.php");
                            // Check connection
                            if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                            }
                            // Consulta
                            $query = 'SELECT POPULAR, 
                                        FROM Inmuebles';
     
                            $result = $conn->query($query);
                            $objtMysql->close();
                            // Recorremos la tabla de la BBDD 
                            if($result != false){
                                for($i=0;$i<$result->num_rows;$i++){
                                        $row = $result->fetch_assoc();
                            ?>
                            <article>
                            <!-- Mostrar resultados --> 
                            
                                <h2> <? echo $row['ID']; ?> </h2>
                                <p> <?php echo $row['DESCRIPCION']; ?></p>
                                <p> <?php echo $row['PRECIO']; ?></p>
                                <p> <?php echo $row['DIMENSION']; ?></p>
                                <p> <?php echo $row['HABITACIONES']; ?></p>
                                <p> <?php echo $row['BAÑOS']; ?></p>
                                <p> <?php echo $row['EMAIL']; ?></p>
                                <p> <?php echo $row['RESERVADA']; ?></p>
                            
                            </article>
                            <?php
                                }
                            }
                            ?>
                            <img class="card-img-top" src="img/Casa 5_casas juntas/casa 5 juntas.jpeg" alt="..." /></div>
                            <!-- Product details-->

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Comprar</a>
                                
                                </div> <br></br>
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="general.html">Seguir navegando</a></div>
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
